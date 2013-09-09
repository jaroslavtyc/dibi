<?php
namespace Pribi\Commands\Transactions\RollbackWorks;
use Pribi\Commands\FollowingCommand;

class AndChain extends FollowingCommand {
	public function release() {
		$release = new Release($this);

		return $release;
	}

	public function noRelease() {
		$noRelease = new NoRelease($this);

		return $noRelease;
	}
}
