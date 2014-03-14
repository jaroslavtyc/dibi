<?php
namespace Pribi\MainQueryCommands\Conditions;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class OrNot extends \Pribi\Commands\Conditions\OrNot implements Executable {
	use AndOring;
	use Comparing;
	use Executabling;
}