<?php
namespace Pribi\Commands\MainQueryStatements\Transactions\Rollbacks;

class RollbackWork extends Rollback {
	protected function toSql() {
		return 'ROLLBACK WORK';
	}
}
