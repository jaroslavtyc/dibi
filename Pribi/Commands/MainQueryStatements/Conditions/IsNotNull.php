<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Base\AndOring;

class IsNotNull extends \Pribi\Commands\AnyQueryStatements\Conditions\IsNotNull {
	use AndOring;
}
