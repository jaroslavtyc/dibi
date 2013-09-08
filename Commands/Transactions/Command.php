<?php
namespace Pribi\Commands\Transactions;
use \Pribi\Core\Object;

abstract class Command extends Object implements \Pribi\Commands\Command {
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
