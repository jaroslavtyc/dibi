<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\WithIdentifier;
use Pribi\Executions\Executabling;

class Where extends WithIdentifier implements Comparison {
	use AndOring;
	use Limiting;
	use Executabling;

	protected function conjunction(Identifier $identifier) {
		return new Conjunction($identifier, $this);
	}

	protected function disjunction(Identifier $identifier) {
		return new Disjunction($identifier, $this);
	}

	protected function toSql() {
		return 'WHERE ' . $this->getIdentifier()->toSql();
	}

	public function equalTo($subject) {
		return new EqualTo(new Identifier($subject), $this);
	}

	public function equalOrGreaterThen($subject) {
		return new EqualOrGreaterThen(new Identifier($subject), $this);
	}

	public function equalOrLesserThen($subject) {
		return new EqualOrLesserThen(new Identifier($subject), $this);
	}

	public function greaterThen($subject) {
		return new GreaterThen(new Identifier($subject), $this);
	}

	public function lesserThen($subject) {
		return new LesserThen(new Identifier($subject), $this);
	}

	public function differentTo($subject) {
		return new DifferentTo(new Identifier($subject), $this);
	}
}
