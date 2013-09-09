<?php
namespace Pribi\Commands\Transactions\Commits;
use Pribi\Commands\Transactions\Command;
use Pribi\Commands\Transactions\Rollbacks\Rollback;

class NoRelease extends Command {
	public function rollback() {
		$rollback = new Rollback($this);

		return $rollback;
	}
}
