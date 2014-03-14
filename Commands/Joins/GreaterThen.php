<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Joinable;

class GreaterThen extends \Pribi\Commands\Conditions\GreaterThen implements Joinable {
	use AndOring;
	use Joining;
}
