<?php
namespace Pribi\Commands\Transactions\Commits;
use Pribi\Commands\Transactions\Commands;

class AndChain extends Commands {
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
