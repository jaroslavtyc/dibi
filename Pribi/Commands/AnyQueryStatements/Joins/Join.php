<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\IdentifierBringer;

/**
 * @method JoinAlias as ($alias)
 */
abstract class Join extends IdentifierBringer {

	public function on($subject) {
		return new On(new Identifier($subject), $this);
	}
}
