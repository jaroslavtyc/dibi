<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Limiting;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Disjunction extends \Pribi\Commands\Conditions\Disjunction implements Executable {
	use AndOring;
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

	public function equalTo($subject) {
		$equalTo = new EqualTo(new Identifier($subject), $this);

		return $equalTo;
	}

	public function equalOrGreaterThen($subject) {
		$equalOrGreaterThen = new EqualOrGreaterThen(new Identifier($subject), $this);

		return $equalOrGreaterThen;
	}

	public function equalOrLesserThen($subject) {
		$equalOrLesserThen = new EqualOrLesserThen(new Identifier($subject), $this);

		return $equalOrLesserThen;
	}

	public function greaterThen($subject) {
		$greaterThen = new GreaterThen(new Identifier($subject), $this);

		return $greaterThen;
	}

	public function lesserThen($subject) {
		$lesserThen = new LesserThen(new Identifier($subject), $this);

		return $lesserThen;
	}

	public function differentTo($subject) {
		$differentTo = new DifferentTo(new Identifier($subject), $this);

		return $differentTo;
	}
}
