<?php
namespace Pribi\Commands;

/**
 * @method CommandBringingIdentificator as($alias)
 */
abstract class CommandBringingIdentificator extends \Pribi\Core\Object implements Command {
	use Aliasing;

	private $subject;
	private $followingCommands;
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