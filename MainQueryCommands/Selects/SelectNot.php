<?php
namespace Pribi\MainQueryCommands\Joins;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

/**
 * @method SelectAlias as ($alias)
 */
class SelectNot extends \Pribi\Commands\Selects\SelectNot implements Executable {
	use Executabling;
}