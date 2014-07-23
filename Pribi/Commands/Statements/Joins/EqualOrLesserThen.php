<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Base\AndOrUsable;
use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Joinable;
use Pribi\Commands\Statements\Limits\Base\Limitable;
use Pribi\Commands\Statements\Limits\Base\Limiting;

class EqualOrLesserThen extends \Pribi\Commands\Conditions\EqualOrLesserThen implements AndOrUsable, Joinable, Limitable {
	use AndOring;
	use Joining;
	use Limiting;
}
