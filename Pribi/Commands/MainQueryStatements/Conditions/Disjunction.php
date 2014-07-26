<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;
use Pribi\Commands\MainQueryStatements\Conditions\Base\AndOring;
use Pribi\Commands\MainQueryStatements\Conditions\Base\Comparing;

class Disjunction extends \Pribi\Commands\AnyQueryStatements\Conditions\Disjunction implements Executable {
	use AndOring;
	use Comparing;
	use Executabling;
}
