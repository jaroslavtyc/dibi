<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;

/**
 * @method LeftJoinAlias as ($alias)
 */
class LeftJoin extends Join {
	protected function alias(Identifier $alias) {
		return new LeftJoinAlias($alias, $this);
	}

	protected function toSql() {
		return 'LEFT JOIN ' . $this->getIdentifier()->toSql();
	}
}
