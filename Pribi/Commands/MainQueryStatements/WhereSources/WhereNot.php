<?php
namespace Pribi\MainQueryCommands\WhereSources;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class WhereNot extends \Pribi\Commands\WhereDefinitions\WhereNot implements Executable {
	use Executabling;
}
