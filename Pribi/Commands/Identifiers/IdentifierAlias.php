<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Builders\CommandsBuilder;
use Pribi\Commands\Command;

abstract class IdentifierAlias extends Command {
	private $alias;

	public function __construct(Identifier $alias, Command $previousCommand, CommandsBuilder $commandsBuilder) {
		$this->alias = $alias;
		parent::__construct($previousCommand, $commandsBuilder);
	}

	/**
	 * @return Identifier
	 */
	protected function getIdentifier() {
		return $this->alias;
	}
}
