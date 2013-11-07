<?php
namespace Pribi\Commands\Transactions\Commits;

use Pribi\Commands\Command;

class AndNoChain extends Command {
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
