<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\AndOrUsable;
use Pribi\Commands\WithIdentifier;

class Disjunction extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'OR ' . $this->getIdentifier()->toSql();
	}
}
