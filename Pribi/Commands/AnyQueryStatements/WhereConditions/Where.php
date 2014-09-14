<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions;

class Where extends \Pribi\Commands\WithIdentifier implements \Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOrUsable,
	\Pribi\Commands\AnyQueryStatements\Conditions\Base\Comparable {
	use \Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOring;
	use \Pribi\Commands\AnyQueryStatements\Conditions\Base\Comparing;

	protected function toSql() {
		return 'WHERE ' . $this->getIdentifier()->toSql();
	}
}
