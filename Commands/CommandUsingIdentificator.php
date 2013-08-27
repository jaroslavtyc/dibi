<?php
namespace Pribi\Commands;

class CommandUsingIdentificator extends \Pribi\Core\Object implements Command {
	private $identificator;
	private $followingCommands;

	public function __construct($identificator, FollowingCommands $followingCommands) {
		$this->identificator = $identificator;
		$this->followingCommands = $followingCommands;
	}

	/**
	 * @return FollowingCommands
	 */
	protected function getFollowingCommands() {
		return $this->followingCommands;
	}

	public function getIdentificator() {
		return $this->identificator;
	}
}