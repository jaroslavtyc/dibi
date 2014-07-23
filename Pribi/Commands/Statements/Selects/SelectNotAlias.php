<?php
namespace Pribi\Commands\Statements\Selects;

use Pribi\Builders\CommandsBuilder;
use Pribi\Commands\Identifiers\Identifier;

class SelectNotAlias extends Base\SelectAlias {
	/**
	 * Constructor with closely specified PreviousCommand, respectively aliased SelectNot
	 *
	 * @param Identifier $alias
	 * @param SelectNot $prependSelectNot
	 * @param CommandsBuilder $commandsBuilder
	 */
	public function __construct(Identifier $alias, SelectNot $prependSelectNot, CommandsBuilder $commandsBuilder) {
		parent::__construct($alias, $prependSelectNot, $commandsBuilder);
	}
}
