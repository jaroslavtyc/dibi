<?php
namespace Pribi\Commands;

use Pribi\Core\Stringable;

class Query extends FollowingCommand implements Stringable {
	private $lastCommand;

	public function __construct(FollowingCommand $lastCommand){
		$this->lastCommand = $lastCommand;
	}

	public function __toString() {
		$query = '';
		$command = $this->lastCommand;
		while ($command->hasPreviousCommand()) {
			$query = $command . $query;
			$command = $command->getPreviousCommand();
		}

		return $query;
	}
}
