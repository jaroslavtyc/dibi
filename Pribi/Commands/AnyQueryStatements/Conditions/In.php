<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

class In extends Parts\In {

	protected function toSql() {
		return 'IN (' . $this->identifiers->toSql() . ')';
	}

	/**
	 * @param \Pribi\Commands\Identifiers\Identifier $identifier
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\Conjunction
	 */
	protected function conjunction(\Pribi\Commands\Identifiers\Identifier $identifier) {
		return $this->getCommandBuilder()->createAnyQueryConjunction($identifier, $this);
	}

	/**
	 * @param \Pribi\Commands\Identifiers\Identifier $identifier
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\Disjunction
	 */
	protected function disjunction(\Pribi\Commands\Identifiers\Identifier $identifier) {
		return $this->getCommandBuilder()->createAnyQueryDisjunction($identifier, $this);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\AndNot
	 */
	public function andNot($subject) {
		return $this->getCommandBuilder()->createAnyQueryAndNot(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\OrNot
	 */
	public function orNot($subject) {
		return $this->getCommandBuilder()->createAnyQueryOrNot(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

}
