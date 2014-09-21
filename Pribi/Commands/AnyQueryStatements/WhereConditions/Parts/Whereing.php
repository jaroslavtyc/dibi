<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions\Parts;

trait Whereing {

	/**
	 * @param string $subject
	 * @return \Pribi\Commands\AnyQueryStatements\WhereConditions\Where
	 */
	public function where($subject) {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createAnyQueryWhere(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param string $subject
	 * @return \Pribi\Commands\AnyQueryStatements\WhereConditions\WhereNot
	 */
	public function whereNot($subject) {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createAnyQueryWhereNot(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}
}
