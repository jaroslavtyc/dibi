<?php
namespace Pribi\Commands\Conditions;

class DifferentTo extends UsingIdentificator {
	use AndOring;

	protected function conjunction($subject) {
		return new Conjunction($subject, $this);
	}

	protected function disjunction($subject) {
		return new Disjunction($subject, $this);
	}

	public function from($subject) {
		return new From($subject, $this);
	}

	public function innerJoin($subject) {
		return new InnerJoin($subject, $this);
	}

	public function leftJoin($subject) {
		return new LeftJoin($subject, $this);
	}

	public function rightJoin($subject) {
		return new RightJoin($subject, $this);
	}

	public function where($subject) {
		return new Where($subject, $this);
	}

	public function limit($limit) {
		return new Limit(0, $limit, $this);
	}

	public function offsetAndLimit($offset, $limit) {
		return new Limit($offset, $limit, $this);
	}
}