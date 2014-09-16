<?php
namespace Pribi\Commands\MainQueryStatements\FromDefinitions;

/**
 * @method FromAlias as ($alias)
 */
class From extends \Pribi\Commands\AnyQueryStatements\FromDefinitions\From implements \Pribi\Executions\Executable {
	use \Pribi\Executions\Executabling;

	protected function alias($aliasName) {
		$this->getCommandBuilder()->createMainQueryFromAlias(
			$this->getCommandBuilder()->createIdentifier($aliasName),
			$this
		);
	}
}
