<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class Disjunction extends WithIdentifier implements Comparison {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'OR ' . $this->getIdentifier()->toSql();
	}
}
