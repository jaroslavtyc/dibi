<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

/**
 * Equivalent meaning as NotEqualTo
 * @see NotEqualTo
 *
 * Class DifferentTo
 * @package Pribi\Commands\MainQueryStatements\Conditions
 */
class DifferentTo extends \Pribi\Commands\AnyQueryStatements\Conditions\DifferentTo
	implements \Pribi\Executions\Executable {

	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;
	use \Pribi\Executions\Executabling;

}
