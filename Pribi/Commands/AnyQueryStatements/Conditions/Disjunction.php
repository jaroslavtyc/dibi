<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

class Disjunction extends \Pribi\Commands\WithIdentifier
	implements \Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOrUsable,
	\Pribi\Commands\AnyQueryStatements\Conditions\Parts\Comparable {

	use \Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOring;

	protected function toSql() {
		return 'OR ' . $this->getIdentifier()->toSql();
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

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\EqualTo
	 */
	public function equalTo($subject) {
		return $this->getCommandBuilder()->createAnyQueryEqualTo(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrGreaterThen
	 */
	public function equalOrGreaterThen($subject) {
		return $this->getCommandBuilder()->createAnyQueryEqualOrGreaterThen(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrLesserThen
	 */
	public function equalOrLesserThen($subject) {
		return $this->getCommandBuilder()->createAnyQueryEqualOrLesserThen(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\GreaterThen
	 */
	public function greaterThen($subject) {
		return $this->getCommandBuilder()->createAnyQueryGreaterThen(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\LesserThen
	 */
	public function lesserThen($subject) {
		return $this->getCommandBuilder()->createAnyQueryLesserThen(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\DifferentTo
	 */
	public function differentTo($subject) {
		return $this->getCommandBuilder()->createAnyQueryDifferentTo(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param int $limit
	 * @return \Pribi\Commands\AnyQueryStatements\Limits\Limit
	 */
	public function limit($limit) {
		return $this->getCommandBuilder()->createAnyQueryLimit(0, $limit, $this);
	}

	/**
	 * @param int $limit
	 * @return \Pribi\Commands\AnyQueryStatements\Limits\Limit
	 */
	public function offsetAndLimit($offset, $limit) {
		return $this->getCommandBuilder()->createAnyQueryLimit($offset, $limit, $this);
	}

}
