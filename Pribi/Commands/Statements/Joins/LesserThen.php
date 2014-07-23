<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Joinable;

class LesserThen extends \Pribi\Commands\Conditions\LesserThen implements Joinable {
	use AndOring;
	use Joining;
}
