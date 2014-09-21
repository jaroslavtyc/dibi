<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

use Pribi\Commands\Identifiers\Identifier;

trait Joining {

	/**
	 * @param string $subject
	 * @return InnerJoin
	 */
	public function innerJoin($subject) {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createAnyQueryInnerJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param string $subject
	 * @return LeftJoin
	 */
	public function leftJoin($subject) {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createAnyQueryLeftJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function rightJoin($subject) {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createAnyQueryRightJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}
}
