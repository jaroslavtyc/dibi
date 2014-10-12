<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

class JoinAlias extends \Pribi\Commands\Identifiers\IdentifierAlias implements \Pribi\Commands\AnyQueryStatements\Limits\Parts\Limitable {

	use \Pribi\Commands\AnyQueryStatements\Limits\Parts\Limiting;

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}

	public function on($subject) {
		return $this->getCommandBuilder()->createAnyQueryOn(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function innerJoin($subject) {
		return $this->getCommandBuilder()->createAnyQueryInnerJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function leftJoin($subject) {
		return $this->getCommandBuilder()->createAnyQueryLeftJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function rightJoin($subject) {
		return $this->getCommandBuilder()->createAnyQueryRightJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function where($subject) {
		return $this->getCommandBuilder()->createAnyQueryWhere(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

}
