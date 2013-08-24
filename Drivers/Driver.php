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
    abstract public function begin($savepointName = FALSE);
    abstract public function savepoint($savepointName = self::DEFAULT_SAVEPOINT);
    abstract public function rollback($savepointName = FALSE);
    abstract public function releaseSavepoint($savepointName = self::DEFAULT_SAVEPOINT);
    abstract public function commit($savepointName = FALSE);
}
