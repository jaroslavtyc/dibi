<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\WithIdentifier;

class Conjunction extends WithIdentifier implements Comparison {
	use AndOrNegating;

	protected function conjunction(Identifier $identifier) {
		return new Conjunction($identifier, $this);
	}

	protected function disjunction(Identifier $identifier) {
		return new Disjunction($identifier, $this);
	}

	protected function negation(Identifier $identifier) {
		return new Negation($identifier, $this);
	}
	
	protected function toSql() {
		return 'AND ' . $this->getIdentifier()->toSql();
	}

	public function equalTo(Identifier $identifier) {
		return new EqualTo($identifier, $this);
	}

	public function equalOrGreaterThen(Identifier $identifier) {
		return new EqualOrGreaterThen($identifier, $this);
	}

	public function equalOrLesserThen(Identifier $identifier) {
		return new EqualOrLesserThen($identifier, $this);
	}

	public function greaterThen(Identifier $identifier) {
		return new GreaterThen($identifier, $this);
	}

	public function lesserThen(Identifier $identifier) {
		return new LesserThen($identifier, $this);
	}

	public function differentTo(Identifier $identifier) {
		return new DifferentTo($identifier, $this);
	}
}
