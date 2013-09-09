<?php
namespace Pribi\Commands\Transactions\BeginWorks;
use Pribi\Commands\FollowingCommand;
use Pribi\Commands\Transactions\CommitWorks\CommitWork;

class BeginWork extends FollowingCommand {
	public function commitWork() {
		$commitWork = new CommitWork($this);

		return $commitWork;
	}
}
