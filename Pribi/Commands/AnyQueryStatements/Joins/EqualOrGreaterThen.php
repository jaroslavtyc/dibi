<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Parts\AndOring;
use Pribi\Commands\AnyQueryStatements\Joins\Parts\Joinable;
use Pribi\Commands\AnyQueryStatements\Limits\Parts\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Parts\Limiting;

class EqualOrGreaterThen extends \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrGreaterThen implements Joinable, Limitable {
	use AndOring;
	use Joining;
	use Limiting;
}
