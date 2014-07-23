<?php
namespace Pribi\Commands\MainQueryStatements\Selects;

/**
 * @method SelectAlias as ($alias)
 */
class Select extends \Pribi\Commands\Statements\Selects\Select implements \Pribi\Executions\Executable {
	use Base\AfterSelecting;
	use \Pribi\Executions\Executabling;

	protected function alias(\Pribi\Commands\Identifiers\Identifier $alias) {
		return new SelectAlias($alias, $this);
	}
}
