<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

class GreaterThen extends \Pribi\Commands\AnyQueryStatements\Joins\GreaterThen {

	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;
	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\Comparing;
	use \Pribi\Executions\Executabling;

}
