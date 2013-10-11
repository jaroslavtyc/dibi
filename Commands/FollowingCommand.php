<?php
namespace Pribi\Commands;

abstract class FollowingCommand extends Object implements Command {
	private $previousCommand;

	public function __construct(Command $previousCommand = NULL) {
		$this->previousCommand = $previousCommand;
	}

	protected  function hasPreviousCommand() {
		return isset($this->previousCommand);
	}

	/**
	 * @return Command
	 */
	protected function getPreviousCommand() {
		return $this->previousCommand;
	}
}
