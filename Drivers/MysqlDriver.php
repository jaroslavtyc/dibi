<?php
namespace Pribi\Drivers;

use Pribi\Drivers\Exceptions\CanNotConnect;
use Pribi\Resources\Credentials;
use Pribi\Resources\DataSourceName;
use Pribi\Resources\Exceptions\AlreadyConnected;
use Pribi\Resources\Exceptions\NotConnected;
use Pribi\Resources\Prepared;

class MysqlDriver implements Driver {
	private $dataSourceName;
	private $credentials;
	private $legacyErrorLevelReporting;
	/**
	 * @var \mysqli
	 */
	private $connection;

	public function connect(DataSourceName $dsn, Credentials $credentials) {
		if (!$this->isConnected()) {
			$this->avoidWarningsReporting();
			$this->connection = new \mysqli($dsn->getHost(), $credentials->getUser(), $credentials->getPassword(), $dsn->getDatabaseName(), $dsn->getPort(), $dsn->getSocket());
			$this->restoreWarningsReporting();
			$this->checkConnectError();
			$this->dataSourceName = $dsn;
			$this->credentials = $credentials;
		} else {
			throw new AlreadyConnected;
		}
	}

	private function avoidWarningsReporting() {
		if (error_reporting() & E_WARNING) {
			$this->legacyErrorLevelReporting = error_reporting();
			error_reporting($this->legacyErrorLevelReporting ^ E_WARNING);
		}
	}

	private function checkConnectError() {
		if ($this->connection->connect_errno) {
			throw new CanNotConnect($this->connection->connect_error);
		}
	}

	private function restoreWarningsReporting() {
		if (isset($this->legacyErrorLevelReporting)) {
			error_reporting($this->legacyErrorLevelReporting);
		}
	}

	public function __destruct() {
		if (isset($this->connection)) {
			$this->connection->close();
		}
	}

	public function isConnected() {
		return isset($this->connection) && $this->isConnectionAlive();
	}

	private function isConnectionAlive() {
		return mysqli_ping($this->connection);
	}

	public function disconnect() {
		if ($this->isConnected()) {
			mysqli_close($this->connection);
			$this->connection = NULL;
		} else {
			throw new NotConnected;
		}
	}

	/**
	 * @param $queryString
	 * @return Prepared
	 */
	public function prepare($queryString) {
		return new Prepared($this->connection->prepare($queryString));
	}
}
