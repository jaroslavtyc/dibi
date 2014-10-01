<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;

class LesserThen extends \Pribi\Commands\AnyQueryStatements\Conditions\LesserThen
	implements \Pribi\Executions\Executable {

	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;
	use \Pribi\Executions\Executabling;

}
