<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOrUsable;
use Pribi\Commands\Joins\Parts\AndOring;
use Pribi\Commands\AnyQueryStatements\Joins\Parts\Joinable;
use Pribi\Commands\AnyQueryStatements\Limits\Parts\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Parts\Limiting;

class EqualTo extends \Pribi\Commands\AnyQueryStatements\Conditions\EqualTo implements AndOrUsable, Joinable, Limitable {
	use AndOring;
	use Joining;
	use Limiting;
}
