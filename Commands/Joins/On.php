<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\EqualOrLesserThen;
use Pribi\Commands\Conditions\GreaterThen;
use Pribi\Commands\Conditions\LesserThen;
use Pribi\Commands\Conditions\Limiting;
use Pribi\Commands\Disjunction;
use Pribi\Commands\EqualTo;
use Pribi\Commands\Negation;
use Pribi\Commands\RightJoin;
use Pribi\Commands\WithIdentifier;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class On extends WithIdentifier implements Executable {
	use AndOring;
	use Executabling;
	use Limiting;

	protected function toSql() {
		return 'ON ' . $this->getIdentifier()->toSql();
	}

	protected function conjunction(Identifier $identifier) {
		$conjunction = new Conjunction($identifier, $this);

		return $conjunction;
	}

	protected function disjunction(Identifier $identifier) {
		$disjunction = new Disjunction($identifier, $this);

		return $disjunction;
	}

	public function equalTo($identifier) {
		$equalTo = new EqualTo($identifier, $this);

		return $equalTo;
	}

	public function equalOrGreaterThen($identifier) {
		$equalOrGreaterThen = new EqualOrGreaterThen($identifier, $this);

		return $equalOrGreaterThen;
	}

	public function greaterThen($identifier) {
		$equalTo = new GreaterThen($identifier, $this);

		return $equalTo;
	}

	public function equalOrLesserThen($identifier) {
		$equalOrGreaterThen = new EqualOrLesserThen($identifier, $this);

		return $equalOrGreaterThen;
	}

	public function lesserThen($identifier) {
		$equalOrGreaterThen = new LesserThen($identifier, $this);

		return $equalOrGreaterThen;
	}

	public function innerJoin($identifier) {
		$innerJoin = new InnerJoin($identifier, $this);

		return $innerJoin;
	}

	public function leftJoin($identifier) {
		$leftJoin = new LeftJoin($identifier, $this);

		return $leftJoin;
	}

	public function rightJoin($identifier) {
		$rightJoin = new RightJoin($identifier, $this);

		return $rightJoin;
	}

	public function where($identifier) {
		$where = new Where($identifier, $this);

		return $where;
	}
}
