<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

class OrNot extends Disjunction {

	protected function toSql() {
		return 'OR NOT ' . $this->getIdentifier()->toSql();
	}

}
