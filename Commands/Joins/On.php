<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\EqualOrLesserThen;
use Pribi\Commands\Conditions\GreaterThen;
use Pribi\Commands\Conditions\LesserThen;
use Pribi\Commands\Conjunction;
use Pribi\Commands\Disjunction;
use Pribi\Commands\EqualTo;
use Pribi\Commands\FromSources\From;
use Pribi\Commands\Negation;
use Pribi\Commands\RightJoin;
use Pribi\Commands\WithIdentifier;
use \Pribi\Commands\AndOrNegating;

class On extends WithIdentifier {
	use AndOrNegating;

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

	public function greaterThen($identificator) {
		$equalTo = new GreaterThen($identificator, $this);

		return $equalTo;
	}

	public function equalOrLesserThen($identificator) {
		$equalOrGreaterThen = new EqualOrLesserThen($identificator, $this);

		return $equalOrGreaterThen;
	}

	public function lesserThen($identificator) {
		$equalOrGreaterThen = new LesserThen($identificator, $this);

		return $equalOrGreaterThen;
	}

	public function from($identificator) {
		$from = new From($identificator, $this);

		return $from;
	}

	public function innerJoin($identificator) {
		$innerJoin = new InnerJoin($identificator, $this);

		return $innerJoin;
	}

	public function leftJoin($identificator) {
		$leftJoin = new LeftJoin($identificator, $this);

		return $leftJoin;
	}

	public function rightJoin($identificator) {
		$rightJoin = new RightJoin($identificator, $this);

		return $rightJoin;
	}

	public function where($identificator) {
		$where = new Where($identificator, $this);

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
