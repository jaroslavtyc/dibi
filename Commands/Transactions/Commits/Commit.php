<?php
namespace Pribi\Commands\Transactions\Commits;
use Pribi\Commands\Transactions\Command;

class Commit extends Command {
	public function andChain() {
		return $this->getFollowingCommands()->andChain();
	}

	public function andNoChain() {
		return $this->getFollowingCommands()->andNoChain();
	}

	public function release() {
		return $this->getFollowingCommands()->release();
	}

	public function noRelease() {
		return $this->getFollowingCommands()->noRelease();
	}

	public function rollback() {
		return $this->getFollowingCommands()->rollback();
	}
}
