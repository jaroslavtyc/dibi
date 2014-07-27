<?php
namespace Pribi\Commands\AnyQueryStatements\Executions;

class DoCommand extends \Pribi\Commands\WithIdentifier implements \Pribi\Commands\SubQueries\SubQueryUsable {

	protected function toSql() {
		return 'DO ' . $this->getIdentifier()->toSql();
	}

	public function subQuery() {
		return $this->getCommandBuilder()->createSubQuery();
	}
}
