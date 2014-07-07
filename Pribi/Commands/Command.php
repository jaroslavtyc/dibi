<?php
namespace Pribi\Commands;

use Pribi\Builders\CommandsBuilder;

abstract class Command extends QueryPart {
	private $previousCommand;
	private $commandsBuilder;

	public function __construct(Command $previousCommand, CommandsBuilder $commandsBuilder) {
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
	 * @return CommandsBuilder
	 */
	protected function getCommandBuilder() {
		return $this->commandsBuilder;
	}
}
