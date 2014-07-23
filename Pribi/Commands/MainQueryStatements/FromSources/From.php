<?php
namespace Pribi\Commands\MainQueryStatements\FromSources;

use Pribi\Commands\Identifiers\Identifier;

/**
 * @method FromAlias as ($alias)
 */
class From extends \Pribi\Commands\FromDefinitions\From implements Executable {
	use Executabling;

	protected function alias(Identifier $alias) {
		return new FromAlias($alias, $this);
	}
}
