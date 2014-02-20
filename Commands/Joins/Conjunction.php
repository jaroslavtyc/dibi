<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Limiting;
use Pribi\Commands\DifferentTo;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Conditions\Limitable;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Conjunction extends \Pribi\Commands\Conditions\Conjunction implements Limitable, Executable{
	use AndOring;
	use Comparing;
	use Limiting;
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
