<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\IdentifierBringer;
use Pribi\Commands\Joins\Inner\InnerJoinAlias;

/**
 * @method InnerJoinAlias as ($alias)
 */
abstract class Join extends IdentifierBringer {
	public function on($identificator) {
		return new On($identificator, $this);
	}
}
