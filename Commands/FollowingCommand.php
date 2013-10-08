<?php
namespace Pribi\Commands;

abstract class FollowingCommand extends FollowedCommand {
	private $previousCommand;

	public function __construct(FollowedCommand $previousCommand = NULL) {
		$this->previousCommand = $previousCommand;
		$this->previousCommand->setFollowingCommand($this);
	}

	protected  function hasPreviousCommand() {
		return isset($this->previousCommand);
	}

	/**
	 * @return FollowedCommand
	 */
	protected function getPreviousCommand() {
		return $this->previousCommand;
	}
}
