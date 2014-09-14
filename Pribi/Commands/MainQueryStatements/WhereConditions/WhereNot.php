<?php
namespace Pribi\Commands\MainQueryStatements\WhereConditions;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class WhereNot extends \Pribi\Commands\AnyQueryStatements\WhereConditions\WhereNot implements Executable {
	use Executabling;
}
