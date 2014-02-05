<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Negation;
use Pribi\Commands\DifferentTo;
use Pribi\Commands\Identifiers\Identifier;

class Conjunction extends \Pribi\Commands\Conditions\Conjunction {
	protected function conjunction(Identifier $subject = NULL) {
		$conjunction = new Conjunction($subject, $this);

		return $conjunction;
	}

	protected function disjunction(Identifier $subject = NULL) {
		$disjunction = new Disjunction($subject, $this);

		return $disjunction;
	}

	protected function negation(Identifier $subject) {
		$negation = new Negation($subject, $this);

		return $negation;
	}

	protected function toSql() {
		return 'AND ' . $this->getIdentifier()->toSql();
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
