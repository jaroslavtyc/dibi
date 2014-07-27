<?php
namespace Pribi\Commands\AnyQueryStatements\Executions;

/**
 * Class DoCommand
 * @package Pribi\Commands\AnyQueryStatements\Executions
 * @see http://dev.mysql.com/doc/refman/5.1/en/do.html
 */
class DoCommand extends \Pribi\Commands\WithIdentifier implements \Pribi\Commands\SubQueries\SubQueryUsable {

	protected function toSql() {
		return 'DO ' . $this->getIdentifier()->toSql();
	}

	public function subQuery() {
		return $this->getCommandBuilder()->createSubQuery();
	}
}
