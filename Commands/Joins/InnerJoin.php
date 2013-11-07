<?php
namespace Pribi\Commands\Joins;

/**
 * @method \Pribi\Commands\Joins\InnerJoinAlias as ($alias)
 */
class InnerJoin extends Join {
	protected function alias($alias) {
		return new InnerJoinAlias($alias, $this);
	}
}
