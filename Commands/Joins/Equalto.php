<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Base\AndOrUsable;
use Pribi\Commands\Limits\Limitable;
use Pribi\Commands\Limits\Limiting;

class EqualTo extends \Pribi\Commands\Conditions\EqualTo implements AndOrUsable, Joinable, Limitable {
	use AndOring;
	use Joining;
	use Limiting;
}
