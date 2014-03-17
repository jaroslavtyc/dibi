<?php
namespace Pribi\Commands\Transactions\Rollbacks;

class RollbackWork extends Rollback {
	protected function toSql() {
		return 'ROLLBACK WORK';
	}
}
