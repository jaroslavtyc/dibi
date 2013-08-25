<?php
namespace Pribi\Commands;

class Commands extends \Pribi\Core\Object {
	const SELECT_SQL = 'SELECT';
	const INSERT_SQL = 'INSERT';
	const UPDATE_SQL = 'UPDATE';
	const DELETE_SQL = 'DELETE';
	const INTO_SQL = 'INTO';
	const FROM_SQL = 'FROM';
	const INNER_JOIN_SQL = 'INNER JOIN';
	const LEFT_JOIN_SQL = 'LEFT JOIN';
	const RIGHT_JOIN_SQL = 'RIGHT JOIN';
	const ON_SQL = 'ON';
	const AS_SQL = 'AS';
	const WHERE_SQL = 'WHERE';
	const AND_SQL = 'AND';
	const OR_SQL = 'OR';
	const LIMIT_SQL = 'LIMIT';
	const VALUES_SQL = 'VALUES';
	const BEGIN_SQL = 'BEGIN';
	const SAVEPOINT_SQL = 'SAVEPOINT';
	const ROLLBACK_SQL = 'ROLLBACK';
	const RELEASE_SAVEPOINT_SQL = 'RELEASE_SAVEPOINT';
	const COMMIT_SQL = 'COMMIT';

	public function select($identificator) {
		return new Select($identificator, $this);
	}
}