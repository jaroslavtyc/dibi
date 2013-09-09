<?php
namespace Pribi\Commands\Transactions\CommitWorks;
use Pribi\Commands\FollowingCommand;
use Pribi\Commands\Transactions\RollbackWorks\RollbackWork;

class Release extends FollowingCommand {
	public function rollbackWork() {
		$rollbackWork = new RollbackWork($this);

		return $rollbackWork;
	}
}
