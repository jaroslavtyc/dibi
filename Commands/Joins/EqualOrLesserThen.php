<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\AndOrUsable;
use Pribi\Commands\Conditions\Limitable;
use Pribi\Commands\Conditions\Limiting;

class EqualOrLesserThen extends \Pribi\Commands\Conditions\EqualOrLesserThen implements AndOrUsable, Joinable, Limitable {
	use AndOring;
	use Joining;
	use Limiting;
}
