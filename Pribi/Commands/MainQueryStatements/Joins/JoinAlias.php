<?php
namespace Pribi\Commands\MainQueryStatements\Joins;

class JoinAlias extends \Pribi\Commands\AnyQueryStatements\Joins\JoinAlias implements JoinLike {

	use \Pribi\Executions\Executabling;

	public function on($subject) {
		return $this->getCommandBuilder()->createMainQueryOn(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function innerJoin($subject) {
		return $this->getCommandBuilder()->createMainQueryInnerJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function leftJoin($subject) {
		return $this->getCommandBuilder()->createMainQueryLeftJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function rightJoin($subject) {
		return $this->getCommandBuilder()->createMainQueryLeftJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function where($subject) {
		return $this->getCommandBuilder()->createMainQueryLeftJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

}
