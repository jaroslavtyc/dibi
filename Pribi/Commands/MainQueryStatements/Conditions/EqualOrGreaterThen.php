<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

class EqualOrGreaterThen extends \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrGreaterThen implements \Pribi\Executions\Executable {

	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;
	use \Pribi\Executions\Executabling;

	/**
	 * @param \Pribi\Commands\Identifiers\Identifier $identifier
	 * @return \Pribi\Commands\MainQueryStatements\Conditions\Conjunction
	 */
	protected function conjunction(\Pribi\Commands\Identifiers\Identifier $identifier) {
		return $this->getCommandBuilder()->createMainQueryConjunction($identifier, $this);
	}

	/**
	 * @param \Pribi\Commands\Identifiers\Identifier $identifier
	 * @return \Pribi\Commands\MainQueryStatements\Conditions\Disjunction
	 */
	protected function disjunction(\Pribi\Commands\Identifiers\Identifier $identifier) {
		return $this->getCommandBuilder()->createMainQueryDisjunction($identifier, $this);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\MainQueryStatements\Conditions\AndNot
	 */
	public function andNot($subject) {
		return $this->getCommandBuilder()->createMainQueryAndNot(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\MainQueryStatements\Conditions\OrNot
	 */
	public function orNot($subject) {
		return $this->getCommandBuilder()->createMainQueryOrNot(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

}