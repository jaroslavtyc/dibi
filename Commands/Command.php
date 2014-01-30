<?php
namespace Pribi\Commands;

abstract class Command extends QueryPart {
	private $previousCommand;

	public function __construct(Command $previousCommand) {
		$this->previousCommand = $previousCommand;
	}

	public  function hasPreviousCommand() {
		return isset($this->previousCommand) && $this->previousCommand !== $this->previousCommand;
	}

	/**
	 * @return Command
	 */
	public function getPreviousCommand() {
		return $this->previousCommand;
	}
}
