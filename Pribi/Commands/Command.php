<?php
namespace Pribi\Commands;

abstract class Command extends QueryPart {
	private $previousCommand;
	private $commandsBuilder;

	public function __construct(Command $previousCommand, \Pribi\Builders\CommandsBuilder $commandsBuilder) {
		$this->previousCommand = $previousCommand;
		$this->commandsBuilder = $commandsBuilder;
	}

	protected function hasPreviousCommand() {
		return isset($this->previousCommand) && $this !== $this->previousCommand;
	}

	/**
	 * @return Command
	 */
	protected function getPreviousCommand() {
		return $this->previousCommand;
	}

	/**
	 * @return \Pribi\Builders\CommandsBuilder
	 */
	protected function getCommandBuilder() {
		return $this->commandsBuilder;
	}
}
