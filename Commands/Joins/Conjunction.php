<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\DifferentTo;

class Conjunction extends \Pribi\Commands\Conjunction {
	protected function conjunction($identificator) {
		$conjunction = new Conjunction($identificator, $this);

		return $conjunction;
	}

	protected function disjunction($identificator) {
		$disjunction = new Disjunction($identificator, $this);

		return $disjunction;
	}

	protected function negation() {
		$negation = new Negation($this);

		return $negation;
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
