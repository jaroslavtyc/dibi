<?php
namespace Pribi\Commands\MainQueryStatements\WhereConditions;

/**
 * @method \Pribi\Commands\MainQueryStatements\Conditions\Conjunction and($subject)
 * @method \Pribi\Commands\MainQueryStatements\Conditions\Disjunction or($subject)
 *
 * @see \Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOring;
 */
class Where extends \Pribi\Commands\AnyQueryStatements\WhereConditions\Where
	implements \Pribi\Executions\Executable {

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

	/**
	 * @param $subject
	 * @return \Pribi\Commands\MainQueryStatements\Conditions\EqualTo
	 */
	public function equalTo($subject) {
		return $this->getCommandBuilder()->createMainQueryEqualTo(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\MainQueryStatements\Conditions\EqualOrGreaterThen
	 */
	public function equalOrGreaterThen($subject) {
		return $this->getCommandBuilder()->createMainQueryEqualOrGreaterThen(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\MainQueryStatements\Conditions\EqualOrLesserThen
	 */
	public function equalOrLesserThen($subject) {
		return $this->getCommandBuilder()->createMainQueryEqualOrLesserThen(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\MainQueryStatements\Conditions\GreaterThen
	 */
	public function greaterThen($subject) {
		return $this->getCommandBuilder()->createMainQueryGreaterThen(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\MainQueryStatements\Conditions\LesserThen
	 */
	public function lesserThen($subject) {
		return $this->getCommandBuilder()->createMainQueryLesserThen(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\MainQueryStatements\Conditions\DifferentTo
	 */
	public function differentTo($subject) {
		return $this->getCommandBuilder()->createMainQueryDifferentTo(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param int $limit
	 * @return \Pribi\Commands\MainQueryStatements\Limits\Limit
	 */
	public function limit($limit) {
		return $this->getCommandBuilder()->createMainQueryLimit(0, $limit, $this);
	}

	/**
	 * @param int $offset
	 * @param int $limit
	 * @return \Pribi\Commands\MainQueryStatements\Limits\Limit
	 */
	public function offsetAndLimit($offset, $limit) {
		return $this->getCommandBuilder()->createMainQueryLimit($offset, $limit, $this);
	}

}
