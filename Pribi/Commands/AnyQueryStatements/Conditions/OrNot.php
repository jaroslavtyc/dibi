<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

use Pribi\Commands\AnyQueryStatements\Conditions\Parts\Disjunction;

class OrNot extends Disjunction {
	protected function toSql() {
		return 'OR NOT ' . $this->getIdentifier()->toSql();
	}
}
