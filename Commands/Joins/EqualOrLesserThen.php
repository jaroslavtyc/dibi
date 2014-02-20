<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Limitable;
use Pribi\Commands\Conditions\Limiting;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class EqualOrLesserThen extends \Pribi\Commands\Conditions\EqualOrLesserThen implements Limitable, Executable {
	use AndOring;
	use Limiting;
	use Executabling;
}
