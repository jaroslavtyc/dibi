<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Executions\Executabling;

class DifferentTo extends \Pribi\Commands\Conditions\DifferentTo {
	use AndOring;
	use Executabling;

	protected function conjunction(Identifier $identifier) {
		$conjunction = new Conjunction($identifier, $this);

		return $conjunction;
	}

	protected function disjunction(Identifier $identifier) {
		$disjunction = new Disjunction($identifier, $this);

		return $disjunction;
	}
}
