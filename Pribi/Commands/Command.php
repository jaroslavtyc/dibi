<?php
namespace Pribi\Commands;

abstract class Command extends QueryPart {
	private $previousCommand;
	private $commandBuilder;

	public function __construct(Command $previousCommand, \Pribi\Builders\CommandBuilder $commandBuilder) {
		$this->previousCommand = $previousCommand;
		$this->commandBuilder = $commandBuilder;
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
	 * @return \Pribi\Builders\CommandBuilder
	 */
	protected function getCommandBuilder() {
		return $this->commandBuilder;
	}
}
