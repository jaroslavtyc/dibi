<?php
namespace Pribi\Commands\MainQueryStatements\Limits;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Limit extends \Pribi\Commands\Statements\Limits\Limit implements Executable {
	use Executabling;
}
