<?php
namespace Pribi\MainQueryCommands\Joins;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class SelectNotAlias extends \Pribi\Commands\Selects\SelectNotAlias implements Executable {
	use Executabling;

	public function __construct(Identifier $alias, SelectNot $prependSelectNot) {
		parent::__construct($alias, $prependSelectNot);
	}
}
