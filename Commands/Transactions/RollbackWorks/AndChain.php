<?php
namespace Pribi\Commands\Transactions\RollbackWorks;
use Pribi\Commands\Transactions\Command;

class AndChain extends Command {
	public function release() {
		$release = new Release($this);

		return $release;
	}

	public function noRelease() {
		$noRelease = new NoRelease($this);

		return $noRelease;
	}
}
