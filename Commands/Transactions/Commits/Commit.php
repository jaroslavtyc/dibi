<?php
namespace Pribi\Commands\Transactions\Commits;
use Pribi\Commands\Transactions\Command;
use Pribi\Commands\Transactions\Rollbacks\Rollback;

class Commit extends Command {
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

	public function rollback() {
		$rollback = new Rollback($this);

		return $rollback;
	}
}
