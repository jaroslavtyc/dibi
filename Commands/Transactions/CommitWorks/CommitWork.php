<?php
namespace Pribi\Commands\Transactions\CommitWorks;

use Pribi\Commands\Command,
	Pribi\Commands\Transactions\Rollbacks\RollbackWork;

class CommitWork extends Command {
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

	public function rollbackWork() {
		$rollback = new RollbackWork($this);

		return $rollback;
	}
}
