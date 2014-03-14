<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\Disjunction;

class Disjunction extends Disjunction {
	protected function toSql() {
		return 'OR ' . $this->getIdentifier()->toSql();
	}
}
