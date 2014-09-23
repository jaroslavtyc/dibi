<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\AnyQueryStatements\Conditions\Parts\Comparable;
use Pribi\Commands\DifferentTo;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Joins\Parts\AndOring;
use Pribi\Commands\Joins\Parts\Comparing;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Parts\Whereable;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Parts\Whereing;

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
