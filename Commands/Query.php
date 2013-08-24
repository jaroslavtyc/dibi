<?php
namespace Pribi\Commands;

class Query extends \Pribi\Core\Object {
    const SELECT_SQL = 'SELECT';
    const INSERT_SQL = 'INSERT';
    const UPDATE_SQL = 'UPDATE';
    const DELETE_SQL = 'DELETE';
    const FROM_SQL = 'FROM';
    const INNER_JOIN_SQL = 'INNER JOIN';
    const LEFT_JOIN_SQL = 'LEFT JOIN';
    const RIGHT_JOIN_SQL = 'RIGHT JOIN';
    const ON_SQL = 'ON';
    const WHERE_SQL = 'WHERE';
    const AND_SQL = 'AND';
    const BEGIN_SQL = 'BEGIN';
    const SAVEPOINT_SQL = 'SAVEPOINT';
    const ROLLBACK_SQL = 'ROLLBACK';
    const RELEASE_SAVEPOINT_SQL = 'RELEASE_SAVEPOINT';
    const COMMIT_SQL = 'COMMIT';

    private $commands = array();

    public function addCommand(Command $command) {
        if (!isset($this->commands[ $command->getType() ])) {
            $this->commands[ $command->getType() ] = array();
        }

        $this->commands[ $command->getType() ][] = $command;
    }

    public function getPreparedQuery() {

    }
}
