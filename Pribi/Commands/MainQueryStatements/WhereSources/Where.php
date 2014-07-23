<?php
namespace Pribi\Commands\MainQueryStatements\WhereSources;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Where extends \Pribi\Commands\WhereDefinitions\Where implements Executable {
	use Executabling;
}
