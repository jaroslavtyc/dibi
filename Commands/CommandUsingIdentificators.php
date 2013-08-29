<?php
namespace Pribi\Commands;

class CommandUsingIdentificators extends \Pribi\Core\Object implements Command {
	private $identificators;
	private $followingCommands;

	public function __construct(array $identificators, FollowingCommands $followingCommands) {
		$this->identificators = $identificators;
		$this->followingCommands = $followingCommands;
	}

	/**
	 * @return FollowingCommands
	 */
	protected function getFollowingCommands() {
		return $this->followingCommands;
	}

	public function getIdentificators() {
		return $this->identificators;
	}
}