<?php
namespace Pribi\Commands\Joins\Inner;
use Pribi\Commands\Joins\Join;

/**
 * @method InnerJoinAlias as($alias)
 */
class InnerJoin extends Join {
	protected function alias($alias) {
		return new InnerJoinAlias($alias, $this);
	}
}
