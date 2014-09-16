<?php
namespace Pribi\Commands\MainQueryStatements\Selects;

/**
 * @method SelectAlias as ($alias)
 */
class Select extends \Pribi\Commands\AnyQueryStatements\Selects\Select implements \Pribi\Executions\Executable {
	use Base\AfterSelecting;
	use \Pribi\Executions\Executabling;

	protected function alias($aliasName) {
		return new SelectAlias($aliasName, $this, $this->getCommandBuilder());
	}
}
