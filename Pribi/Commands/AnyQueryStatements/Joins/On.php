<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

class On extends \Pribi\Commands\WithIdentifier implements \Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOrUsable,
	\Pribi\Commands\AnyQueryStatements\Conditions\Base\Comparable,
	\Pribi\Commands\AnyQueryStatements\WhereConditions\Parts\Whereable,
	\Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable
{

	use \Pribi\Commands\Joins\Parts\AndOring;
	use \Pribi\Commands\Joins\Parts\Comparing;
	use \Pribi\Commands\AnyQueryStatements\WhereConditions\Parts\Whereing;
	use \Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;

	protected function toSql() {
		return 'ON ' . $this->getIdentifier()->toSql();
	}
}
