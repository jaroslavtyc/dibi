<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\EqualOrLesserThen;
use Pribi\Commands\Conditions\GreaterThen;
use Pribi\Commands\Conditions\LesserThen;
use Pribi\Commands\Disjunction;
use Pribi\Commands\EqualTo;
use Pribi\Commands\FromSources\From;
use Pribi\Commands\Negation;
use Pribi\Commands\RightJoin;
use Pribi\Commands\WithIdentifier;
use Pribi\Commands\Identifiers\Identifier;

class On extends WithIdentifier {
	use AndOrNegating;

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

	protected function negation(Identifier $identifier) {
		$negation = new Negation($identifier, $this);

		return $negation;
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

	public function from($identifier) {
		$from = new From($identifier, $this);

		return $from;
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

	public function limit($limit) {
		$limit = new Limit(0, $limit, $this);

		return $limit;
	}

	public function offsetAndLimit($offset, $limit) {
		$limit = new Limit($offset, $limit, $this);

		return $limit;
	}
}
