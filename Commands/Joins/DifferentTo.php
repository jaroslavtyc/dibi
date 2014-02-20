<?php
namespace Pribi\Commands\Joins;

use Pribi\Executions\Executabling;

class DifferentTo extends \Pribi\Commands\Conditions\DifferentTo implements Joinable {
	use AndOring;
	use Joining;
	use Executabling;
}
