<?php
namespace Pribi\MainQueryCommands\Joins;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class EqualTo extends \Pribi\Commands\Joins\EqualTo implements Executable {
	use Executabling;
}
