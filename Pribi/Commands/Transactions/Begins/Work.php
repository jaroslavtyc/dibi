<?php
namespace Pribi\Commands\Transactions\Begins;

class Work extends \Pribi\Commands\WithoutIdentifier implements \Pribi\Executions\Executable {
	use \Pribi\Executions\Executabling;

	protected function toSql() {
		return 'WORK';
	}

	public function work() {
		return $this->getCommandBuilder()->createWork($this);
	}

	public function commit() {
		$commit = new Commit($this);

		return $commit;
	}
}
