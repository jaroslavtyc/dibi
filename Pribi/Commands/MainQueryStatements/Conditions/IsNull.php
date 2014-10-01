<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;

class IsNull extends \Pribi\Commands\AnyQueryStatements\Conditions\IsNull {
	use AndOring;
}
