<?php
namespace Pribi\Commands;

use Pribi\Core\Stringable;

class Query extends FollowingCommand implements \Iterator, Stringable {
	private $lastCommand;
	private $firstCommand;
	private $current;
	private $key;

	public function __construct(FollowingCommand $lastCommand){
		$this->lastCommand = $lastCommand;
		$this->firstCommand = $this->findFirstCommand();
	}

	/**
	 * @return FollowedCommand
	 */
	private function findFirstCommand() {
		while ($this->lastCommand->hasPreviousCommand()) {
			$firstCommand = $this->lastCommand->getPreviousCommand();
		}

		return $firstCommand;
	}

	/**
	 * @return FollowedCommand
	 */
	public function current() {
		return $this->current;
	}

	public function next() {
		if ($this->current()->hasFollowingCommand()) {
			$this->current = $this->current()->getFollowingCommand();
			$this->key++;
		} else {
			$this->current = NULL;
			$this->key = NULL;
		}
	}

	public function key() {
		return $this->key;
	}

	public function valid() {
		return !is_null($this->key);
	}

	public function rewind() {
		$this->current = $this->firstCommand;
		$this->key = 0;
	}

	public function __toString() {
		$query = '';
		foreach ($this as $command) {
			$query .= $command;
		}

		return $command;
	}
}
