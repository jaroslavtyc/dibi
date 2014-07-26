<?php
namespace Pribi\Commands\MainQueryStatements\Limits;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Limit extends \Pribi\Commands\AnyQueryStatements\Limits\Limit implements Executable {
	use Executabling;
}
