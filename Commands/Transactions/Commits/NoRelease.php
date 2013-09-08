<?php
namespace Pribi\Commands\Transactions\Commits;
use Pribi\Commands\Transactions\Command;

class NoRelease extends Command {
	public function rollback() {
		return $this->getFollowingCommands()->rollback();
	}

	public function rollbackWork() {
		return $this->getFollowingCommands()->rollbackWork();
	}
}
