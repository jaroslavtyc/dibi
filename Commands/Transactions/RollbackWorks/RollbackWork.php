<?php
namespace Pribi\Commands\Transactions\RollbackWorks;
use Pribi\Commands\FollowingCommand;

class RollbackWork extends FollowingCommand {
	public function andChain() {
		$andChain = new AndChain($this);

		return $andChain;
	}

	public function andNoChain() {
		$noChain = new AndNoChain($this);

		return $noChain;
	}

	public function release() {
		$release = new Release($this);

		return $release;
	}

	public function noRelease() {
		$noRelease = new NoRelease($this);

		return $noRelease;
	}
}
