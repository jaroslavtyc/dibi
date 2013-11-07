<?php
namespace Pribi\Commands\Joins;

/**
 * @method \Pribi\Commands\Joins\LeftJoinAlias as ($alias)
 */
class LeftJoin extends Join {
	protected function alias($alias) {
		return new LeftJoinAlias($alias, $this);
	}
}
