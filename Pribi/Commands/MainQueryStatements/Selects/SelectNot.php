<?php
namespace Pribi\MainQueryCommands\Selects;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;
use Pribi\MainQueryCommands\Selects\Base\AfterSelecting;

/**
 * @method SelectAlias as ($alias)
 */
class SelectNot extends \Pribi\Commands\Statements\Selects\SelectNot implements Executable {
	use AfterSelecting;
	use Executabling;

	protected function alias(Identifier $alias) {
		return new SelectNotAlias($alias, $this);
	}
}
