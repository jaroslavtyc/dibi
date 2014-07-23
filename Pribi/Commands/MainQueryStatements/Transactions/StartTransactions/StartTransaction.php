<?php
namespace Pribi\Commands\MainQueryStatements\Transactions\StartTransactions;

use Pribi\Commands\WithoutIdentifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class StartTransaction extends WithoutIdentifier implements Executable {
	use Executabling;

	protected function toSql() {
		return 'START TRANSACTION';
	}

	public function withConsistentSnapshot() {
		$withConsistentSnapshot = new WithConsistentSnapshot($this);

		return $withConsistentSnapshot;
	}
}
