<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;

class IsNotNull extends \Pribi\Commands\AnyQueryStatements\Conditions\IsNotNull {
	use AndOring;
}
