<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Parts\AndOring;
use Pribi\Commands\AnyQueryStatements\Joins\Parts\Joinable;

class GreaterThen extends \Pribi\Commands\AnyQueryStatements\Conditions\GreaterThen implements Joinable {
	use AndOring;
	use Joining;
}
