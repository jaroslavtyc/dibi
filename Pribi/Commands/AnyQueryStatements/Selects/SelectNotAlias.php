<?php
namespace Pribi\Commands\AnyQueryStatements\Selects;

use Pribi\Builders\CommandBuilder;
use Pribi\Commands\Identifiers\Identifier;

class SelectNotAlias extends Base\SelectAlias {
	/**
	 * Constructor with closely specified PreviousCommand, respectively aliased SelectNot
	 *
	 * @param Identifier $alias
	 * @param SelectNot $prependSelectNot
	 * @param CommandBuilder $commandBuilder
	 */
	public function __construct(Identifier $alias, SelectNot $prependSelectNot, CommandBuilder $commandBuilder) {
		parent::__construct($alias, $prependSelectNot, $commandBuilder);
	}
}
