<?php
namespace Pribi\Commands\Transactions;

abstract class Command extends \Pribi\Core\Object implements \Pribi\Commands\Command {

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
