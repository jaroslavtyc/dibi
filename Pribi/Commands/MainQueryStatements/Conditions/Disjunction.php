<?php
namespace Pribi\MainQueryCommands\Conditions;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;
use Pribi\MainQueryCommands\Conditions\Base\AndOring;
use Pribi\MainQueryCommands\Conditions\Base\Comparing;

class Disjunction extends \Pribi\Commands\Conditions\Disjunction implements Executable {
	use AndOring;
	use Comparing;
	use Executabling;
}
