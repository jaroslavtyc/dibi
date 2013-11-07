<?php
namespace Pribi\Commands\Joins;

/**
 * @method \Pribi\Commands\Joins\RightJoinAlias as ($alias)
 */
class RightJoin extends Join {
	protected function alias($alias) {
		return new RightJoinAlias($alias, $this);
	}
}
