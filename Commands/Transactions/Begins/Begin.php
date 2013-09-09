<?php
namespace Pribi\Commands\Transactions\Begins;
use Pribi\Commands\FollowingCommand;
use Pribi\Commands\Transactions\Commits\Commit;

class Begin extends FollowingCommand {
	public function commit() {
		$commit = new Commit($this);

		return $commit;
	}
}
