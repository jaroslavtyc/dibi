<?php
namespace Pribi\Commands\WhereSources;

use Pribi\Commands\Conditions\AndOring;
use Pribi\Commands\Conditions\AndOrUsable;
use Pribi\Commands\Conditions\Comparable;
use Pribi\Commands\Conditions\Comparing;
use Pribi\Commands\WithIdentifier;

class Where extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'WHERE ' . $this->getIdentifier()->toSql();
	}
}
