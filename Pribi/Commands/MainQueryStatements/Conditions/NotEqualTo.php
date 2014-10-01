<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

/**
 * Equivalent meaning as DifferentTo
 * @see DifferentTo
 *
 * Class NotEqualTo
 * @package Pribi\Commands\MainQueryStatements\Conditions
 */
class NotEqualTo extends \Pribi\Commands\AnyQueryStatements\Conditions\NotEqualTo
	implements \Pribi\Executions\Executable {

	use \Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;
	use \Pribi\Executions\Executabling;

}
