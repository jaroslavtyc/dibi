<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\AndOring;
use Pribi\Commands\Conditions\Base\AndOrUsable;
use Pribi\Commands\Conditions\Base\Comparable;
use Pribi\Commands\Conditions\Base\Comparing;
use Pribi\Commands\WithIdentifier;

class Conjunction extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'AND ' . $this->getIdentifier()->toSql();
	}
}
