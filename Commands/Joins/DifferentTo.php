<?php
namespace Pribi\Commands\Joins;

use Pribi\Executions\Executabling;

class DifferentTo extends \Pribi\Commands\Conditions\DifferentTo {
	use AndOring;
	use Executabling;
}
