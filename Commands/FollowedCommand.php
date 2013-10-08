<?php
namespace Pribi\Commands;

use \Pribi\Core\Object;
use \Pribi\Commands\Command;

abstract class FollowedCommand extends Object implements Command {
	private $followingCommand;

	/**
	 * @return Command
	 */
	protected function setFollowingCommand(FollowingCommand $followingCommand) {
		$this->followingCommand = $followingCommand;
	}

	protected function hasFollowingCommand() {
		return isset($this->followingCommand);
	}

	/**
	 * @return FollowingCommand
	 */
	protected function getFollowingCommand() {
		return $this->followingCommand;
	}
}
