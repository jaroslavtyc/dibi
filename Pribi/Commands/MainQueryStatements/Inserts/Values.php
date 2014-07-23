<?php
namespace Pribi\MainQueryCommands\Joins;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Values extends \Pribi\Commands\Statements\Inserts\Values implements Executable {
	use Executabling;
}
