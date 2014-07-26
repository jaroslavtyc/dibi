<?php
namespace Pribi\Commands\MainQueryStatements\Joins;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Values extends \Pribi\Commands\AnyQueryStatements\Inserts\Values implements Executable {
	use Executabling;
}
