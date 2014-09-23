<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

use Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOring;
use Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOrUsable;
use Pribi\Commands\AnyQueryStatements\Conditions\Parts\Comparable;
use Pribi\Commands\AnyQueryStatements\Conditions\Parts\Comparing;
use Pribi\Commands\WithIdentifier;

class Conjunction extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'AND ' . $this->getIdentifier()->toSql();
	}
}
