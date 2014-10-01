<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;

class In extends \Pribi\Commands\AnyQueryStatements\Conditions\In {
	use AndOring;
}
