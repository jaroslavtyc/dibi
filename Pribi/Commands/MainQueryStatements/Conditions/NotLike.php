<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Base\AndOring;

class NotLike extends \Pribi\Commands\AnyQueryStatements\Conditions\NotLike {
	use AndOring;
}
