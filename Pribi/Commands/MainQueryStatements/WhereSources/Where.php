<?php
namespace Pribi\MainQueryCommands\WhereSources;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Where extends \Pribi\Commands\WhereDefinitions\Where implements Executable {
	use Executabling;
}
