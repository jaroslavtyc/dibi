<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class Conjunction extends WithIdentifier implements Comparison {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'AND ' . $this->getIdentifier()->toSql();
	}
}
