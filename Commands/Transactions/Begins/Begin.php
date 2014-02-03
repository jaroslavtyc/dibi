<?php
namespace Pribi\Commands\Transactions\Begins;

use Pribi\Commands\Command,
	Pribi\Commands\Transactions\Commits\Commit;

class Begin extends Command {
	public function commit() {
		$commit = new Commit($this);

		return $commit;
	}
}
