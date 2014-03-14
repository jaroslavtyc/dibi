<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Joinable;

class DifferentTo extends \Pribi\Commands\Conditions\DifferentTo implements Joinable {
	use AndOring;
	use Joining;
}
