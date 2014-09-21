<?php
namespace Pribi\Commands\MainQueryStatements\FromDefinitions;

/**
 * @method FromAlias as ($alias)
 */
class From extends \Pribi\Commands\AnyQueryStatements\FromDefinitions\From implements \Pribi\Executions\Executable {
	use \Pribi\Executions\Executabling;

	protected function alias($aliasName) {
		$this->getCommandBuilder()->createMainQueryFromAlias(
			$this->getCommandBuilder()->createIdentifier($aliasName),
			$this
		);
	}

	/**
	 * @param string $subject
	 * @return \Pribi\Commands\MainQueryStatements\WhereConditions\Where
	 */
	public function where($subject) {
		return $this->getCommandBuilder()->createMainQueryWhere(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param string $subject
	 * @return \Pribi\Commands\AnyQueryStatements\WhereConditions\WhereNot
	 */
	public function whereNot($subject) {
		return $this->getCommandBuilder()->createMainQueryWhereNot(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}
}
