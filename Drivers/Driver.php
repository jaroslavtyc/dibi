<?php
namespace Pribi\Drivers;

use Pribi\Resources\Connection, \Pribi\Commands\Query;

abstract class Driver {
	const DEFAULT_SAVEPOINT = 'default';
	private $connection;

	public function __construct(Connection $connection) {
		$this->connection = $connection;
	}

	/**
	 * @return Connection
	 */
	protected function getConnection() {
		return $this->connection;
	}

	abstract public function runQuery(Query $query);

	abstract public function getAffectedRows();

	abstract public function getInsertedId();
}
