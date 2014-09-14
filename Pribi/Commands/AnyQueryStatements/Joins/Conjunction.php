<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\AnyQueryStatements\Conditions\Base\Comparable;
use Pribi\Commands\DifferentTo;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Comparing;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Base\Whereable;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Base\Whereing;

class Conjunction extends \Pribi\Commands\AnyQueryStatements\Conditions\Conjunction implements Comparable, Whereable, Limitable {
	use AndOring;
	use Comparing;
	use Whereing;
	use Limiting;

	protected function conjunction(Identifier $identifier) {
		$conjunction = new Conjunction($identifier, $this);

		return $conjunction;
	}

	protected function disjunction(Identifier $identifier) {
		$disjunction = new Disjunction($identifier, $this);

		return $disjunction;
	}
}
