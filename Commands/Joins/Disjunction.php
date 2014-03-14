<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Comparing;
use Pribi\Commands\Limits\Base\Limitable;
use Pribi\Commands\Limits\Base\Limiting;

class Disjunction extends \Pribi\Commands\Conditions\Disjunction implements Limitable {
	use AndOring;
	use Comparing;
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
