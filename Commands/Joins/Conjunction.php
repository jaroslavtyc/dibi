<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Base\Comparable;
use Pribi\Commands\DifferentTo;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Comparing;
use Pribi\Commands\Limits\Base\Limitable;
use Pribi\Commands\Limits\Base\Limiting;
use Pribi\Commands\WhereSources\Base\Whereable;
use Pribi\Commands\WhereSources\Base\Whereing;

class Conjunction extends \Pribi\Commands\Conditions\Conjunction implements Comparable, Whereable, Limitable {
	use AndOring;
	use Comparing;
	use \Pribi\Commands\WhereSources\Base\Whereing;
	use \Pribi\Commands\Limits\Base\Limiting;

	protected function conjunction(Identifier $identifier) {
		$conjunction = new Conjunction($identifier, $this);

		return $conjunction;
	}

	protected function disjunction(Identifier $identifier) {
		$disjunction = new Disjunction($identifier, $this);

		return $disjunction;
	}
}
