<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

class Disjunction extends Parts\Disjunction {
	protected function toSql() {
		return 'OR ' . $this->getIdentifier()->toSql();
	}
}
