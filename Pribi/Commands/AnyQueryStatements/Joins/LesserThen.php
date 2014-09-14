<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\AnyQueryStatements\Joins\Base\Joinable;

class LesserThen extends \Pribi\Commands\AnyQueryStatements\Conditions\LesserThen implements Joinable {
	use AndOring;
	use Joining;
}
