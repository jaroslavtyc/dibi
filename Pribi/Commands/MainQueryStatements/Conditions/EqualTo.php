<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Base\AndOring;

class EqualTo extends \Pribi\Commands\AnyQueryStatements\Conditions\EqualTo {
	use AndOring;
}
