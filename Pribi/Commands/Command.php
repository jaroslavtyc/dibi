<?php
namespace Pribi\Commands;

abstract class Command extends QueryPart {
	private $previousCommand;

	public function __construct(Command $previousCommand) {
		$this->previousCommand = $previousCommand;
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
}
