<?php
namespace Pribi\Commands\MainQueryStatements\Joins;

use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class EqualOrLesserThen extends \Pribi\Commands\Joins\EqualOrLesserThen implements Executable {
	use Executabling;
}
