<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Joins\Base\AndOring;
use Pribi\Commands\Joins\Base\Joinable;
use Pribi\Commands\Statements\Limits\Base\Limitable;
use Pribi\Commands\Statements\Limits\Base\Limiting;

class EqualOrGreaterThen extends \Pribi\Commands\Conditions\EqualOrGreaterThen implements Joinable, Limitable {
	use AndOring;
	use Joining;
	use Limiting;
}