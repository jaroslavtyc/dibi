<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Base\AndOrUsable;
use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Joinable;
use Pribi\Commands\Statements\Limits\Base\Limitable;
use Pribi\Commands\Statements\Limits\Base\Limiting;

class EqualTo extends \Pribi\Commands\Conditions\EqualTo implements AndOrUsable, Joinable, Limitable {
	use AndOring;
	use Joining;
	use Limiting;
}
