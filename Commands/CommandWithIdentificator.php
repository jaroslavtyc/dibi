<?php
namespace Pribi\Commands;

/**
 * @method as($alias) @return Command
 */
abstract class CommandWithIdentificator extends \Pribi\Core\Object implements Command {
	use Alias;

	private $alias;

	public function __construct($identificator, FollowingCommands $followingCommands) {
		$this->identificator = $identificator;
		$this->followingCommands = $followingCommands;
	}

	protected function alias($name) {
		$this->setAlias($name);

		return $this;
	}

	/**
	 * @return FollowingCommands
	 */
	protected function getFollowingCommands() {
		return $this->followingCommands;
	}

	public function setAlias($alias) {
		$this->alias = $alias;
	}

	public function getIdentificator() {
		return $this->identificator;
	}

	public function getAlias() {
		return $this->alias;
	}

	public function getFinalName() {
		if (!\is_null($this->getAlias())) {
			return $this->getAlias();
		} else {
			return $this->getIdentificator();
		}
	}
}