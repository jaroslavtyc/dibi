<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions;

class Where extends \Pribi\Commands\WithIdentifier implements
	\Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOrUsable,
	\Pribi\Commands\AnyQueryStatements\Conditions\Parts\Comparable {

	use \Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOring;
	use \Pribi\Commands\AnyQueryStatements\Conditions\Parts\Comparing;

	protected function toSql() {
		return 'WHERE ' . $this->getIdentifier()->toSql();
	}
}
