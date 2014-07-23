<?php
namespace Pribi\MainQueryCommands\Selects;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;
use Pribi\MainQueryCommands\Selects\Base\AfterSelecting;

class SelectAlias extends \Pribi\Commands\Statements\Selects\SelectAlias implements Executable {
	use AfterSelecting;
	use Executabling;

	public function __construct(Identifier $alias, Select $prependSelect) {
		parent::__construct($alias, $prependSelect);
	}
}
