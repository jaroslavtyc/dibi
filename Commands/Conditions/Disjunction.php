<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;
use Pribi\Commands\Identifiers\Identifier;

class Disjunction extends WithIdentifier implements Comparison {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'OR ' . $this->getIdentifier()->toSql();
	}
}
