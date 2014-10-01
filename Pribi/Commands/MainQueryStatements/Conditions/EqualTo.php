<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

class EqualTo extends \Pribi\Commands\AnyQueryStatements\Conditions\EqualTo implements \Pribi\Executions\Executable {

	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;
	use \Pribi\Executions\Executabling;

}
