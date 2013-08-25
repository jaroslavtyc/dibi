<?php
namespace Pribi\Commands;
abstract class CommandWithIdentificator extends \Pribi\Core\Object implements Command {
	private $alias;

	public function __construct($identificator, FollowingCommands $followingCommands) {
		$this->identificator = $identificator;
		$this->followingCommands = $followingCommands;
	}

	public function setAlias($alias) {
		$this->alias = $alias;
	}

	protected function getIdentificator() {
		return $this->identificator;
	}

	/**
	 * @return FollowingCommands
	 */
	protected function getFollowingCommands() {
		return $this->followingCommands;
	}

	protected function getAlias() {
		return $this->alias;
	}
}