<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

/**
 * @method \Pribi\Commands\Joins\RightJoinAlias as ($alias)
 */
class RightJoin extends Join {

	protected function alias($aliasName) {
		return new RightJoinAlias($aliasName, $this);
	}

	protected function toSql() {
		return 'RIGHT JOIN ' . $this->getIdentifier()->toSql();
	}
}
