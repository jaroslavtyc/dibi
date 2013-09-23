<?php
namespace Pribi\Commands;
use \Pribi\Core\Object;
use \Pribi\Commands\Command;

abstract class FollowingCommand extends Object implements Command {
	private $previousCommand;

	public function __construct(Command $previousCommand = NULL) {
		$this->previousCommand = $previousCommand;
	}

	public function hasPreviousCommand() {
		return !\is_null($this->previousCommand);
	}

	/**
	 * @return Command
	 */
	public function getPreviousCommand() {
		return $this->previousCommand;
	}
}
