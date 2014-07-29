<?php
namespace Pribi\Commands;

abstract class WithIdentifier extends Command {
	private $identifier;

	public function __construct(\Pribi\Commands\Identifiers\Identifier $identifier, Command $previousCommand, \Pribi\Builders\CommandsBuilder $commandsBuilder) {
		$this->identifier = $identifier;
		parent::__construct($previousCommand, $commandsBuilder);
	}

	/**
	 * @return \Pribi\Commands\Identifiers\Identifier
	 */
	protected function getIdentifier() {
		return $this->identifier;
	}
}
