<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\AnyQueryStatements\Joins\Base\Joinable;

class DifferentTo extends \Pribi\Commands\AnyQueryStatements\Conditions\DifferentTo implements Joinable {
	use AndOring;
	use Joining;
}
