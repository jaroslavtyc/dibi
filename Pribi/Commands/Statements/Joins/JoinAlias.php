<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\IdentifierAlias;

abstract class JoinAlias extends IdentifierAlias {
	public function on($name) {
		return new On(new Identifier($name), $this);
	}
}
