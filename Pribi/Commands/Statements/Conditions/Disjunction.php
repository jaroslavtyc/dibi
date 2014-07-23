<?php
namespace Pribi\Commands\Conditions;

class Disjunction extends Base\Disjunction {
	protected function toSql() {
		return 'OR ' . $this->getIdentifier()->toSql();
	}
}
