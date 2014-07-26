<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Base\AndOring;

class IsNull extends \Pribi\Commands\AnyQueryStatements\Conditions\IsNull {
	use AndOring;
}
