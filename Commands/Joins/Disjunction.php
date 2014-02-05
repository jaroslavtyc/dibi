<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;

class Disjunction extends \Pribi\Commands\Conditions\Disjunction {
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
		return 'OR ' . $this->getIdentifier()->toSql();
	}

	public function equalTo($identificator) {
		$equalTo = new EqualTo($identificator, $this);

		return $equalTo;
	}

	public function equalOrGreaterThen($identificator) {
		$equalOrGreaterThen = new EqualOrGreaterThen($identificator, $this);

		return $equalOrGreaterThen;
	}

	public function equalOrLesserThen($identificator) {
		$equalOrLesserThen = new EqualOrLesserThen($identificator, $this);

		return $equalOrLesserThen;
	}

	public function greaterThen($identificator) {
		$greaterThen = new GreaterThen($identificator, $this);

		return $greaterThen;
	}

	public function lesserThen($identificator) {
		$lesserThen = new LesserThen($identificator, $this);

		return $lesserThen;
	}

	public function differentTo($identificator) {
		$differentTo = new DifferentTo($identificator, $this);

		return $differentTo;
	}
}
