<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

/**
 * @method LeftJoinAlias as ($alias)
 */
class LeftJoin extends Join {

	protected function alias($aliasName) {
		$this->getCommandBuilder()->createAnyQueryJoinAlias(
			$this->getCommandBuilder()->createIdentifier($aliasName),
			$this
		);
	}

	protected function toSql() {
		return 'LEFT JOIN ' . $this->getIdentifier()->toSql();
	}
}
