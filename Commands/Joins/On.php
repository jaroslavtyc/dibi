<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Base\AndOrUsable;
use Pribi\Commands\Conditions\Base\Comparable;
use Pribi\Commands\Disjunction;
use Pribi\Commands\EqualTo;
use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Comparing;
use Pribi\Commands\Limits\Base\Limitable;
use Pribi\Commands\Limits\Base\Limiting;
use Pribi\Commands\Negation;
use Pribi\Commands\RightJoin;
use Pribi\Commands\WhereSources\Base\Whereable;
use Pribi\Commands\WhereSources\Base\Whereing;
use Pribi\Commands\WithIdentifier;

class On extends WithIdentifier implements AndOrUsable, Comparable, Whereable, Limitable {
	use AndOring;
	use Comparing;
	use Whereing;
	use Limiting;

	protected function toSql() {
		return 'ON ' . $this->getIdentifier()->toSql();
	}
}
