<?php
namespace Pribi\Commands;

/**
 * @method as($alias) @return Command
 */
abstract class CommandBringingIdentificator extends \Pribi\Core\Object implements Command {
	use Alias;

	private $subject;
	private $alias;

	public function __construct($subject, FollowingCommands $followingCommands) {
		$this->subject = $subject;
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
		if (!\is_null($this->getAlias())) {
			return $this->getAlias();
		} else {
			return $this->getSubject();
		}
	}
}