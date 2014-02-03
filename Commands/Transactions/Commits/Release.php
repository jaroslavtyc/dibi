<?php
namespace Pribi\Commands\Transactions\Commits;

use Pribi\Commands\Command,
	Pribi\Commands\Transactions\Rollbacks\Rollback;

class Release extends Command {
	public function rollback() {
		$rollback = new Rollback($this);

		return $rollback;
	}
}
