<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

class OrNot extends \Pribi\Commands\AnyQueryStatements\Conditions\OrNot implements \Pribi\Executions\Executable {

	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;
	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\Comparing;
	use \Pribi\Executions\Executabling;

}
