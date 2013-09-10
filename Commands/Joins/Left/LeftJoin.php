<?php
namespace Pribi\Commands\Joins\Left;
use Pribi\Commands\Joins\Join;

/**
 * @method LeftJoinAlias as($alias)
 */
class LeftJoin extends Join {
	protected function alias($alias) {
		return new LeftJoinAlias($alias, $this);
	}
}
