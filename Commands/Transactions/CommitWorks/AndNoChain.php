<?php
namespace Pribi\Commands\Transactions\CommitWorks;

use Pribi\Commands\Command;
use Pribi\Commands\Transactions\RollbackWorks\RollbackWork;

class AndNoChain extends Command {
	public function release() {
		$release = new Release($this);

		return $release;
	}

	public function noRelease() {
		$noRelease = new NoRelease($this);

		return $noRelease;
	}

	public function rollbackWork() {
		$rollbackWork = new RollbackWork($this);

		return $rollbackWork;
	}
}
