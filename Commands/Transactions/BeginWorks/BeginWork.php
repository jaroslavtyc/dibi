<?php
namespace Pribi\Commands\Transactions\BeginWorks;

use Pribi\Commands\Command,
	Pribi\Commands\Transactions\CommitWorks\CommitWork;

class BeginWork extends Command {
	public function commitWork() {
		$commitWork = new CommitWork($this);

		return $commitWork;
	}
}
