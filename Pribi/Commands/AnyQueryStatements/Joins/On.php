<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOrUsable;
use Pribi\Commands\AnyQueryStatements\Conditions\Base\Comparable;
use Pribi\Commands\Disjunction;
use Pribi\Commands\EqualTo;
use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Comparing;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;
use Pribi\Commands\Negation;
use Pribi\Commands\RightJoin;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Base\Whereable;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Base\Whereing;
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
