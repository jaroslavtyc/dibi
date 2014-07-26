<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Base\AndOring;

class In extends \Pribi\Commands\AnyQueryStatements\Conditions\In {
	use AndOring;
}
