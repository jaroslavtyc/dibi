<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Conditions\Limiting;
use Pribi\Executions\Executabling;

class EqualTo extends \Pribi\Commands\Conditions\EqualTo implements Joinable {
	use AndOring;
	use Joining;
	use Limiting;
	use Executabling;
}
