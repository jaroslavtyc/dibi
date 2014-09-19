<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Parts\AndOring;
use Pribi\Commands\AnyQueryStatements\Joins\Parts\Joinable;

class DifferentTo extends \Pribi\Commands\AnyQueryStatements\Conditions\DifferentTo implements Joinable {
	use AndOring;
	use Joining;
}
