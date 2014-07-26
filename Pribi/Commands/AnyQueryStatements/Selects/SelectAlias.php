<?php
namespace Pribi\Commands\AnyQueryStatements\Selects;

use Pribi\Builders\CommandsBuilder;
use Pribi\Commands\Identifiers\Identifier;

class SelectAlias extends Base\SelectAlias {
	/**
	 * Constructor with closely specified PreviousCommand, respectively aliased Select
	 *
	 * @param Identifier $alias
	 * @param Select $prependSelect
	 * @param CommandsBuilder $commandsBuilder
	 */
	public function __construct(Identifier $alias, Select $prependSelect, CommandsBuilder $commandsBuilder) {
		parent::__construct($alias, $prependSelect, $commandsBuilder);
	}
}
