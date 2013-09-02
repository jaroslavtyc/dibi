<?php
namespace Pribi\Commands;

class CommandWithoutIdentificator extends \Pribi\Core\Object implements Command {
	private $followingCommands;

	public function __construct(FollowingCommands $followingCommands) {
		$this->followingCommands = $followingCommands;
	}

	/**
	 * @return FollowingCommands
	 */
	protected function getFollowingCommands() {
		return $this->followingCommands;
	}
}
