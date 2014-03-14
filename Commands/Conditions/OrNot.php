<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\Disjunction;

class OrNot extends Disjunction {
	protected function toSql() {
		return 'OR NOT ' . $this->getIdentifier()->toSql();
	}
}
