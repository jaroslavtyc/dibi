<?php
namespace Pribi\Resources;

class LegacyConnection extends \Pribi\Core\Object {
	public $onEvent;
	private $config;
	private $driver;
	private $translator;
	private $connected = FALSE;
	private $substitutes;

	/**
	 * Connection options: (see driver-specific options too)
	 *   - lazy (bool) => if TRUE, connection will be established only when required
	 *   - result (array) => result set options
	 *       - formatDateTime => date-time format (if empty, DateTime objects will be returned)
	 *   - profiler (array or bool)
	 *       - run (bool) => enable profiler?
	 *       - file => file to log
	 *   - substitutes (array) => map of driver specific substitutes (under development)
	 */
	public function __construct($config, $name = NULL) {
		// DSN string
		if (\is_string($config)) {
			\parse_str($config, $config);
		} elseif ($config instanceof Traversable) {
			$tmp = array();
			foreach ($config as $key => $val) {
				$tmp[$key] = $val instanceof \Traversable ? \iterator_to_array($val) : $val;
			}
			$config = $tmp;
		} elseif (!\is_array($config)) {
			throw new InvalidArgumentException('Configuration must be array, string or object.');
		}

		self::alias($config, 'username', 'user');
		self::alias($config, 'password', 'pass');
		self::alias($config, 'host', 'hostname');
		self::alias($config, 'result|formatDate', 'resultDate');
		self::alias($config, 'result|formatDateTime', 'resultDateTime');

		if (!isset($config['driver'])) {
			$config['driver'] = pribi::$defaultDriver;
		}

		$class = \preg_replace(array('#\W#', '#sql#'), array('_', 'Sql'), \ucfirst(\strtolower($config['driver'])));
		$class = "Pribi{$class}Driver";
		if (!\class_exists($class, FALSE)) {
			include_once \dirname(__FILE__) . "/../drivers/$class.php";

			if (!\class_exists($class, FALSE)) {
				throw new DibiException("Unable to create instance of pribi driver '$class'.");
			}
		}

		$config['name'] = $name;
		$this->config = $config;
		$this->driver = new $class;
		$this->translator = new DibiTranslator($this);

		$profilerCfg = & $config['profiler'];
		if (\is_scalar($profilerCfg)) {
			$profilerCfg = array('run' => (bool)$profilerCfg);
		}
		if (!empty($profilerCfg['run'])) {
			$filter = isset($profilerCfg['filter']) ? $profilerCfg['filter'] : DibiEvent::QUERY;

			if (isset($profilerCfg['file'])) {
				$this->onEvent[] = array(new DibiFileLogger($profilerCfg['file'], $filter), 'logEvent');
			}

			if (DibiFirePhpLogger::isAvailable()) {
				$this->onEvent[] = array(new DibiFirePhpLogger($filter), 'logEvent');
			}

			if (\class_exists('DibiNettePanel', FALSE)) {
				$panel = new DibiNettePanel(isset($profilerCfg['explain']) ? $profilerCfg['explain'] : TRUE, $filter);
				$panel->register($this);
			}
		}

		$this->substitutes = new DibiHashMap(\create_function('$expr', 'return ":$expr:";'));
		if (!empty($config['substitutes'])) {
			foreach ($config['substitutes'] as $key => $value) {
				$this->substitutes->$key = $value;
			}
		}

		if (empty($config['lazy'])) {
			$this->connect();
		}
	}

	public function __destruct() {
		// disconnects and rolls back transaction - do not rely on auto-disconnect and rollback!
		$this->connected && $this->driver->getResource() && $this->disconnect();
	}

	public function connect() {
		$event = $this->onEvent ? new DibiEvent($this, DibiEvent::CONNECT) : NULL;
		try {
			$this->driver->connect($this->config);
			$this->connected = TRUE;
			$event && $this->onEvent($event->done());
		} catch (DibiException $e) {
			$event && $this->onEvent($event->done($e));
			throw $e;
		}
	}

	public function disconnect() {
		$this->driver->disconnect();
		$this->connected = FALSE;
	}

	public function isConnected() {
		return $this->connected;
	}

	public function getConfig($key = NULL, $default = NULL) {
		if ($key === NULL) {
			return $this->config;
		} elseif (isset($this->config[$key])) {
			return $this->config[$key];
		} else {
			return $default;
		}
	}

	public static function alias(& $config, $key, $alias) {
		$foo = & $config;
		foreach (\explode('|', $key) as $key) {
			$foo = & $foo[$key];
		}

		if (!isset($foo) && isset($config[$alias])) {
			$foo = $config[$alias];
			unset($config[$alias]);
		}
	}

	/**
	 * @return IDibiDriver
	 */
	final public function getDriver() {
		$this->connected || $this->connect();

		return $this->driver;
	}

	/**
	 * @return DibiResult|int   result set object (if any)
	 */
	final public function query($args) {
		$args = \func_get_args();

		return $this->nativeQuery($this->translateArgs($args));
	}

	final public function translate($args) {
		$args = \func_get_args();

		return $this->translateArgs($args);
	}

	final public function test($args) {
		$args = \func_get_args();
		try {
			pribi::dump($this->translateArgs($args));

			return TRUE;
		} catch (DibiException $e) {
			if ($e->getSql()) {
				pribi::dump($e->getSql());
			} else {
				echo \get_class($e) . ': ' . $e->getMessage() . (PHP_SAPI === 'cli' ? "\n" : '<br>');
			}

			return FALSE;
		}
	}

	final public function dataSource($args) {
		$args = \func_get_args();

		return new DibiDataSource($this->translateArgs($args), $this);
	}

	private function translateArgs($args) {
		$this->connected || $this->connect();

		return $this->translator->translate($args);
	}

	final public function nativeQuery($sql) {
		$this->connected || $this->connect();

		pribi::$sql = $sql;
		$event = $this->onEvent ? new DibiEvent($this, DibiEvent::QUERY, $sql) : NULL;
		try {
			$res = $this->driver->query($sql);
		} catch (DibiException $e) {
			$event && $this->onEvent($event->done($e));
			throw $e;
		}

		if ($res) {
			$res = $this->createResultSet($res);
		} else {
			$res = $this->driver->getAffectedRows();
		}

		$event && $this->onEvent($event->done($res));

		return $res;
	}

	public function getAffectedRows() {
		$this->connected || $this->connect();
		$rows = $this->driver->getAffectedRows();
		if (!\is_int($rows) || $rows < 0) {
			throw new DibiException('Cannot retrieve number of affected rows.');
		}

		return $rows;
	}

	public function affectedRows() {
		return $this->getAffectedRows();
	}

	public function getInsertId($sequence = NULL) {
		$this->connected || $this->connect();
		$id = $this->driver->getInsertId($sequence);
		if ($id < 1) {
			throw new DibiException('Cannot retrieve last generated ID.');
		}

		return (int)$id;
	}

	public function insertId($sequence = NULL) {
		return $this->getInsertId($sequence);
	}

	public function begin($savepoint = NULL) {
		$this->connected || $this->connect();
		$event = $this->onEvent ? new DibiEvent($this, DibiEvent::BEGIN, $savepoint) : NULL;
		try {
			$this->driver->begin($savepoint);
			$event && $this->onEvent($event->done());
		} catch (DibiException $e) {
			$event && $this->onEvent($event->done($e));
			throw $e;
		}
	}

	public function commit($savepoint = NULL) {
		$this->connected || $this->connect();
		$event = $this->onEvent ? new DibiEvent($this, DibiEvent::COMMIT, $savepoint) : NULL;
		try {
			$this->driver->commit($savepoint);
			$event && $this->onEvent($event->done());
		} catch (DibiException $e) {
			$event && $this->onEvent($event->done($e));
			throw $e;
		}
	}

	public function rollback($savepoint = NULL) {
		$this->connected || $this->connect();
		$event = $this->onEvent ? new DibiEvent($this, DibiEvent::ROLLBACK, $savepoint) : NULL;
		try {
			$this->driver->rollback($savepoint);
			$event && $this->onEvent($event->done());
		} catch (DibiException $e) {
			$event && $this->onEvent($event->done($e));
			throw $e;
		}
	}

	/**
	 * @return DibiResult
	 */
	public function createResultSet(IDibiResultDriver $resultDriver) {
		$res = new DibiResult($resultDriver);

		return $res->setFormat(pribi::DATE, $this->config['result']['formatDate'])->setFormat(pribi::DATETIME, $this->config['result']['formatDateTime']);
	}

	/**
	 * @return DibiFluent
	 */
	public function command() {
		return new DibiFluent($this);
	}

	/**
	 * @return DibiFluent
	 */
	public function select($args) {
		$args = \func_get_args();

		return $this->command()->__call('select', $args);
	}

	/**
	 * @return DibiFluent
	 */
	public function update($table, $args) {
		if (!(\is_array($args) || $args instanceof Traversable)) {
			throw new InvalidArgumentException('Arguments must be array or Traversable.');
		}

		return $this->command()->update('%n', $table)->set($args);
	}

	/**
	 * @return DibiFluent
	 */
	public function insert($table, $args) {
		if ($args instanceof Traversable) {
			$args = \iterator_to_array($args);
		} elseif (!\is_array($args)) {
			throw new InvalidArgumentException('Arguments must be array or Traversable.');
		}

		return $this->command()->insert()->into('%n', $table, '(%n)', array_keys($args))->values('%l', $args);
	}

	/**
	 * @return DibiFluent
	 */
	public function delete($table) {
		return $this->command()->delete()->from('%n', $table);
	}

	/**
	 * Returns substitution hashmap.
	 * @return DibiHashMap
	 */
	public function getSubstitutes() {
		return $this->substitutes;
	}

	public function substitute($value) {
		return \strpos($value, ':') === FALSE ? $value : preg_replace_callback('#:([^:\s]*):#', array($this, 'subCb'), $value);
	}

	private function subCb($m) {
		return $this->substitutes->{$m[1]};
	}

	/**
	 * @param  array|mixed one or more arguments
	 * @return DibiRow
	 * @throws DibiException
	 */
	public function fetch($args) {
		$args = \func_get_args();

		return $this->query($args)->fetch();
	}

	/**
	 * @param  array|mixed one or more arguments
	 * @return array of DibiRow
	 * @throws DibiException
	 */
	public function fetchAll($args) {
		$args = \func_get_args();

		return $this->query($args)->fetchAll();
	}

	/**
	 * @param  array|mixed one or more arguments
	 * @return string
	 * @throws DibiException
	 */
	public function fetchSingle($args) {
		$args = \func_get_args();

		return $this->query($args)->fetchSingle();
	}

	/**
	 * @param  array|mixed one or more arguments
	 * @return string
	 * @throws DibiException
	 */
	public function fetchPairs($args) {
		$args = \func_get_args();

		return $this->query($args)->fetchPairs();
	}

	/**
	 * @param  string  filename
	 * @return int  count of sql commands
	 */
	public function loadFile($file) {
		$this->connected || $this->connect();
		@\set_time_limit(0); // intentionally @

		$handle = @\fopen($file, 'r'); // intentionally @
		if (!$handle) {
			throw new RuntimeException("Cannot open file '$file'.");
		}

		$count = 0;
		$sql = '';
		while (!\feof($handle)) {
			$s = \fgets($handle);
			$sql .= $s;
			if (\substr(rtrim($s), -1) === ';') {
				$this->driver->query($sql);
				$sql = '';
				$count++;
			}
		}
		if (\trim($sql) !== '') {
			$this->driver->query($sql);
			$count++;
		}
		\fclose($handle);

		return $count;
	}

	/**
	 * @return DibiDatabaseInfo
	 */
	public function getDatabaseInfo() {
		$this->connected || $this->connect();

		return new DibiDatabaseInfo($this->driver->getReflector(), isset($this->config['database']) ? $this->config['database'] : NULL);
	}

	public function __wakeup() {
		throw new DibiNotSupportedException('You cannot serialize or unserialize ' . $this->getClass() . ' instances.');
	}

	public function __sleep() {
		throw new DibiNotSupportedException('You cannot serialize or unserialize ' . $this->getClass() . ' instances.');
	}
}
