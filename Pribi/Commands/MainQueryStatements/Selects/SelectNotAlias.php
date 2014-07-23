<?php
namespace Pribi\MainQueryCommands\Selects;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;
use Pribi\MainQueryCommands\Selects\Base\AfterSelecting;

class SelectNotAlias extends \Pribi\Commands\Statements\Selects\SelectNotAlias implements Executable {
	use AfterSelecting;
	use Executabling;

	public function __construct(Identifier $alias, SelectNot $prependSelectNot) {
		parent::__construct($alias, $prependSelectNot);
	}
}
