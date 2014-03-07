<?php
namespace Pribi\MainQueryCommands\Conditions;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Conjunction extends \Pribi\Commands\Conditions\Conjunction implements Executable {
	use AndOring;
	use Comparing;
	use Executabling;
}
