<?php
namespace Pribi\Commands\Joins\Right;
use Pribi\Commands\Joins\Join;

/**
 * @method RightJoinAlias as($alias)
 */
class RightJoin extends Join {
	protected function alias($alias) {
		return new RightJoinAlias($alias, $this);
	}
}
