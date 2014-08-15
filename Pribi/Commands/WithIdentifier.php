<?php
namespace Pribi\Commands;

abstract class WithIdentifier extends Command {
	private $identifier;

	public function __construct(\Pribi\Commands\Identifiers\Identifier $identifier, Command $previousCommand, \Pribi\Builders\CommandBuilder $commandBuilder) {
		$this->identifier = $identifier;
		parent::__construct($previousCommand, $commandBuilder);
	}

	/**
	 * @return \Pribi\Commands\Identifiers\Identifier
	 */
	protected function getIdentifier() {
		return $this->identifier;
	}
}
