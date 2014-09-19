<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Parts\AndOring;
use Pribi\Commands\AnyQueryStatements\Joins\Parts\Joinable;

class LesserThen extends \Pribi\Commands\AnyQueryStatements\Conditions\LesserThen implements Joinable {
	use AndOring;
	use Joining;
}
