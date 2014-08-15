<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Builders\CommandBuilder;
use Pribi\Commands\Command;

abstract class IdentifierAlias extends Command {
	private $alias;

	public function __construct(Identifier $alias, Command $previousCommand, CommandBuilder $commandBuilder) {
		$this->alias = $alias;
		parent::__construct($previousCommand, $commandBuilder);
	}

	/**
	 * @return Identifier
	 */
	protected function getIdentifier() {
		return $this->alias;
	}
}
