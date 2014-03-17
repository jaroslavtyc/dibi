<?php
namespace Pribi\Commands\Transactions\Begins;

use Pribi\Commands\Transactions\Commits\Commit;
use Pribi\Commands\WithoutIdentifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Begin extends WithoutIdentifier implements Executable {
	use Executabling;

	protected function toSql() {
		return 'BEGIN';
	}

	public function commit() {
		$commit = new Commit($this);

		return $commit;
	}
}
