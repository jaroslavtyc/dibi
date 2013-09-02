<?php
namespace Pribi\Commands\Transactions;

class Commit extends CommandWithOptionalWork {
	public function andChain() {
		return $this->getFollowingCommands()->andChain();
	}

	public function andNoChain() {
		return $this->getFollowingCommands()->andNoChain();
	}
}
