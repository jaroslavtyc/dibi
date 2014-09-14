<?php
namespace Pribi\Commands\MainQueryStatements\FromDefinitions;

/**
 * @method FromAlias as ($alias)
 */
class From extends \Pribi\Commands\AnyQueryStatements\FromDefinitions\From implements \Pribi\Executions\Executable {
	use \Pribi\Executions\Executabling;

	protected function alias(\Pribi\Commands\Identifiers\Identifier $alias) {
		return new FromAlias($alias, $this);
	}
}
