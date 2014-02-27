<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Limits\Limitable;
use Pribi\Commands\Limits\Limiting;

class Disjunction extends \Pribi\Commands\Conditions\Disjunction implements Limitable {
	use AndOring;
	use Comparing;
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
