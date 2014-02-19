<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\IdentifierBringer;

/**
 * @method InnerJoinAlias as ($alias)
 */
abstract class Join extends IdentifierBringer {
	public function on($subject) {
		return new On(new Identifier($subject), $this);
	}
}
