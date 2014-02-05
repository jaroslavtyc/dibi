<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Identifiers\Identifier;

class DifferentTo extends UsingIdentificator {
	use AndOring;

	protected function conjunction(Identifier $identifier) {
		return new Conjunction($identifier, $this);
	}

	protected function disjunction(Identifier $identifier) {
		return new Disjunction($identifier, $this);
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