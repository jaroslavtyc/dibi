<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;

class NotLike extends \Pribi\Commands\AnyQueryStatements\Conditions\NotLike {
	use AndOring;
}
