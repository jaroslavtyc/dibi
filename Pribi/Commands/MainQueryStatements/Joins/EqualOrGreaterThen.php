<?php
namespace Pribi\Commands\MainQueryStatements\Joins;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class EqualOrGreaterThen extends \Pribi\Commands\Joins\EqualOrGreaterThen implements Executable {
	use Executabling;
}
