<?php
namespace Pribi\Commands;

use Pribi\Builders\CommandsBuilder;
use Pribi\Commands\Identifiers\Identifier;

abstract class WithIdentifier extends Command {
	private $identifier;

	public function __construct(Identifier $identifier, Command $previousCommand, CommandsBuilder $commandsBuilder) {
		$this->identifier = $identifier;
		parent::__construct($previousCommand, $commandsBuilder);
	}

	protected function getIdentifier() {
		return $this->identifier;
	}
}
