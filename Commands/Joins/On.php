<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Comparable;
use Pribi\Commands\Conditions\Limitable;
use Pribi\Commands\Conditions\Limiting;
use Pribi\Commands\Conditions\Whereable;
use Pribi\Commands\Conditions\Whereing;
use Pribi\Commands\Disjunction;
use Pribi\Commands\EqualTo;
use Pribi\Commands\Negation;
use Pribi\Commands\RightJoin;
use Pribi\Commands\WithIdentifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class On extends WithIdentifier implements Comparable, Whereable, Limitable, Executable {
	use AndOring;
	use Comparing;
	use Whereing;
	use Limiting;
	use Executabling;

	protected function toSql() {
		return 'ON ' . $this->getIdentifier()->toSql();
	}
}
