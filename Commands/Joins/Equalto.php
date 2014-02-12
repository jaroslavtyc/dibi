<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Limiting;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Executions\Executabling;

class EqualTo extends \Pribi\Commands\Conditions\EqualTo {
	use AndOring;
	use Limiting;
	use Executabling;

	protected function conjunction(Identifier $identifier) {
		return new Conjunction($identifier, $this);
	}

	protected function disjunction(Identifier $identifier) {
		return new Disjunction($identifier, $this);
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
