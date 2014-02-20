<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Limitable;
use Pribi\Commands\Conditions\Limiting;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class EqualOrGreaterThen extends \Pribi\Commands\Conditions\EqualOrGreaterThen implements Limitable, Executable {
	use AndOring;
	use Limiting;
	use Executabling;
}
