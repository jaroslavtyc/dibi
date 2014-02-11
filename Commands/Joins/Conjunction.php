<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\DifferentTo;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Conjunction extends \Pribi\Commands\Conditions\Conjunction implements Executable {
	use AndOrNegating;
	use Executabling;

	protected function conjunction(Identifier $identifier) {
		$conjunction = new Conjunction($identifier, $this);

		return $conjunction;
	}

	protected function disjunction(Identifier $identifier) {
		$disjunction = new Disjunction($identifier, $this);

		return $disjunction;
	}

	protected function negation(Identifier $identifier) {
		$negation = new Negation($identifier, $this);

		return $negation;
	}

	protected function toSql() {
		return 'AND ' . $this->getIdentifier()->toSql();
	}

	public function equalTo(Identifier $identifier) {
		$equalTo = new EqualTo($identifier, $this);

		return $equalTo;
	}

	public function equalOrGreaterThen(Identifier $identifier) {
		$equalOrGreaterThen = new EqualOrGreaterThen($identifier, $this);

		return $equalOrGreaterThen;
	}

	public function equalOrLesserThen(Identifier $identifier) {
		$equalOrLesserThen = new EqualOrLesserThen($identifier, $this);

		return $equalOrLesserThen;
	}

	public function greaterThen(Identifier $identifier) {
		$greaterThen = new GreaterThen($identifier, $this);

		return $greaterThen;
	}

	public function lesserThen(Identifier $identifier) {
		$lesserThen = new LesserThen($identifier, $this);

		return $lesserThen;
	}

	public function differentTo(Identifier $identifier) {
		$differentTo = new DifferentTo($identifier, $this);

		return $differentTo;
	}
}
