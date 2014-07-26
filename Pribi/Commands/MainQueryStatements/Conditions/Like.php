<?php
namespace Pribi\Commands\MainQueryStatements\Conditions;

use Pribi\Commands\MainQueryStatements\Conditions\Base\AndOring;

class Like extends \Pribi\Commands\AnyQueryStatements\Conditions\Like {
	use AndOring;
}
