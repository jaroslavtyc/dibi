<?php
namespace Pribi\Commands\Transactions\CommitWorks;
use Pribi\Commands\Transactions\Command;
use Pribi\Commands\Transactions\RollbackWorks\RollbackWork;

class Release extends Command {
	public function rollbackWork() {
		$rollbackWork = new RollbackWork($this);

		return $rollbackWork;
	}
}
