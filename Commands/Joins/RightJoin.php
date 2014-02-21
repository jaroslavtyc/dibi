<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;

/**
 * @method \Pribi\Commands\Joins\RightJoinAlias as ($alias)
 */
class RightJoin extends Join {
	protected function alias(Identifier $alias) {
		return new RightJoinAlias($alias, $this);
	}

	protected function toSql() {
		return 'RIGHT JOIN ' . $this->getIdentifier()->toSql();
	}
}
