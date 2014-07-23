<?php
namespace Pribi\Commands\MainQueryStatements\Transactions\Begins;

use Pribi\Commands\MainQueryStatements\Transactions\Commits\Commit;

class Begin extends \Pribi\Commands\WithoutIdentifier implements \Pribi\Executions\Executable {
	use \Pribi\Executions\Executabling;

	protected function toSql() {
		return 'BEGIN';
	}

	public function work() {
		return $this->getCommandBuilder()->createMainQueryWork($this);
	}

	public function commit() {
		$commit = new Commit($this);

		return $commit;
	}
}
