<?php
namespace Pribi\Commands\Transactions\Rollbacks;
use Pribi\Commands\Transactions\Command;

class Rollback extends Command {
	public function andChain() {
		return $this->getFollowingCommands()->andRollbackChain();
	}

	public function andNoChain() {
		return $this->getFollowingCommands()->andRollbackNoChain();
	}

	public function release() {
		return $this->getFollowingCommands()->rollbackRelease();
	}

	public function noRelease() {
		return $this->getFollowingCommands()->rollbackNoRelease();
	}
}
