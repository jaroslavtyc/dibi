<?php
namespace Pribi\Commands\MainQueryStatements\Joins;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class GreaterThen extends \Pribi\Commands\Joins\GreaterThen implements Executable {
	use Executabling;
}
