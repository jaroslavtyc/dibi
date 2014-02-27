<?php
namespace Pribi\Commands\Conditions;

class OrNot extends Disjunction {
	protected function toSql() {
		return 'OR NOT ' . $this->getIdentifier()->toSql();
	}
}
