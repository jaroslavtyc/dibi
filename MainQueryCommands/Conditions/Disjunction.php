<?php
namespace Pribi\MainQueryCommands\Conditions;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Disjunction extends \Pribi\Commands\Conditions\Disjunction implements Executable {
	use AndOring;
	use Comparing;
	use Executabling;
}
