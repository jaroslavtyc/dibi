<?php
namespace Pribi\MainQueryCommands\FromSources;

use Pribi\Commands\Identifiers\Identifier;

/**
 * @method FromAlias as ($alias)
 */
class From extends \Pribi\Commands\FromSources\From implements Executable {
	use Executabling;

	protected function alias(Identifier $alias) {
		return new FromAlias($alias, $this);
	}
}
