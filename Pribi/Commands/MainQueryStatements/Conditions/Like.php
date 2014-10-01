<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Parts\AndOring;

class Like extends \Pribi\Commands\AnyQueryStatements\Conditions\Like {
	use AndOring;
}
