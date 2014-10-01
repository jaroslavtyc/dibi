<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

class EqualOrLesserThen extends \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrLesserThen implements \Pribi\Executions\Executable {

	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;
	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\Comparing;
	use \Pribi\Executions\Executabling;

}
