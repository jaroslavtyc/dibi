<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

use Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOring;

/**
 * Equivalent meaning as NotEqualTo
 * @see NotEqualTo
 *
 * Class DifferentTo
 * @package Pribi\Commands\AnyQueryStatements\Conditions
 */
class DifferentTo extends \Pribi\Commands\WithIdentifier
	implements \Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOrUsable, \Pribi\Commands\AnyQueryStatements\Conditions\Parts\Comparable {

	use \Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOring;
	use \Pribi\Commands\AnyQueryStatements\Conditions\Parts\Comparing;

	protected function toSql() {
		return '<> ' . $this->getIdentifier()->toSql();
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
