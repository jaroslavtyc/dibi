<?php
namespace Pribi\Resources;

use Pribi\Resources\Exceptions\AlreadyConnected;
use Pribi\Resources\Exceptions\NotConnected;

class MysqlDriver implements Driver {
	private $dataSourceName;
	private $credentials;
	/**
	 * @var \mysqli
	 */
	private $connection;

	public function connect(DataSourceName $dsn, Credentials $credentials) {
		if (!$this->isConnected()) {
			$this->connection = new \mysqli(
				$dsn->getHost(),
				$credentials->getUser(),
				$credentials->getPassword(),
				$dsn->getDatabaseName(),
				$dsn->getPort(),
				$dsn->getSocket()
			);
			$this->dataSourceName = $dsn;
			$this->credentials = $credentials;
		} else {
			throw new AlreadyConnected;
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
