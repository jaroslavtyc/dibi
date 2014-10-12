<?php
namespace Pribi\Commands\MainQueryStatements\Joins;

/**
 * @method JoinAlias as ($alias)
 */
class InnerJoin extends \Pribi\Commands\AnyQueryStatements\Joins\InnerJoin implements JoinLike {

	use \Pribi\Executions\Executabling;

	/**
	 * @param $aliasName
	 * @return \Pribi\Commands\MainQueryStatements\Joins\JoinAlias
	 */
	protected function alias($aliasName) {
		return $this->getCommandBuilder()->createMainQueryJoinAlias(
			$this->getCommandBuilder()->createIdentifier($aliasName),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return On
	 */
	public function on($subject) {
		return $this->getCommandBuilder()->createMainQueryOn(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $tableName
	 * @return \Pribi\Commands\MainQueryStatements\Joins\InnerJoin
	 */
	public function innerJoin($tableName) {
		return $this->getCommandBuilder()->createMainQueryInnerJoin(
			$this->getCommandBuilder()->createIdentifier($tableName),
			$this
		);
	}

	/**
	 * @param $tableName
	 * @return \Pribi\Commands\MainQueryStatements\Joins\LeftJoin
	 */
	public function leftJoin($tableName) {
		return $this->getCommandBuilder()->createMainQueryLeftJoin(
			$this->getCommandBuilder()->createIdentifier($tableName),
			$this
		);
	}

	/**
	 * @param $tableName
	 * @return \Pribi\Commands\MainQueryStatements\Joins\RightJoin
	 */
	public function rightJoin($tableName) {
		return $this->getCommandBuilder()->createMainQueryLeftJoin(
			$this->getCommandBuilder()->createIdentifier($tableName),
			$this
		);
	}

	/**
	 * @param $tableName
	 * @return \Pribi\Commands\MainQueryStatements\WhereConditions\Where
	 */
	public function where($tableName) {
		return $this->getCommandBuilder()->createMainQueryLeftJoin(
			$this->getCommandBuilder()->createIdentifier($tableName),
			$this
		);
	}

}
