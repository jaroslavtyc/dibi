<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

use Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOring;
use Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOrUsable;
use Pribi\Commands\AnyQueryStatements\Conditions\Base\Comparable;
use Pribi\Commands\AnyQueryStatements\Conditions\Base\Comparing;
use Pribi\Commands\WithIdentifier;

class Conjunction extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'AND ' . $this->getIdentifier()->toSql();
	}
}
