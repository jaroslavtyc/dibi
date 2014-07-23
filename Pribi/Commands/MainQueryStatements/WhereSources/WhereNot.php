<?php
namespace Pribi\Commands\MainQueryStatements\WhereSources;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class WhereNot extends \Pribi\Commands\WhereDefinitions\WhereNot implements Executable {
	use Executabling;
}
