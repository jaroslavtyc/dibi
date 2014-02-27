<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\AndOrUsable;
use Pribi\Commands\WithIdentifier;

class Conjunction extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'AND ' . $this->getIdentifier()->toSql();
	}
}
