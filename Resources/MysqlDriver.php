<?php
namespace Pribi\Resources;

use Pribi\Resources\Exceptions\AlreadyConnected;
use Pribi\Resources\Exceptions\NotConnected;

class MysqlDriver implements Driver {
	private $dsn;
	/**
	 * @var \PDO
	 */
	private $connection;

	public function __construct(MysqlDataSourceName $dsn) {
		$this->dsn = $dsn;
	}

	public function connect(Credentials $credentials) {
		if (!$this->isConnected()) {
			$this->connection = new \PDO($this->dsn->getName(), $credentials->getUser(), $credentials->getPassword());
		} else {
			throw new AlreadyConnected;
		}
	}

	public function isConnected() {
		return isset($this->connection) && $this->isConnectionAlive();
	}

	private function isConnectionAlive() {
		try {
			$this->connection->exec('SELECT 1');
			$alive = TRUE;
		} catch (\PDOException $exception) {
			$alive = FALSE;
		}

		return $alive;
	}

	public function disconnect() {
		if ($this->isConnected()) {
			$this->connection = NULL;
		} else {
			throw new NotConnected;
		}
	}

	public function prepare($queryString) {
		return new Prepared($this->connection->prepare($queryString));
	}
}
