<?php
namespace Pribi\Commands;

use Pribi\Core\Object;

class QueryExecutor extends Object implements Executor {
	private $connection;

	public function __construct(Connection $connection) {
		$this->connection = $connection;
	}

	public function execute($stringQuery) {
		return new QueryResult($this->connection->executeQuery($stringQuery));
	}
}
