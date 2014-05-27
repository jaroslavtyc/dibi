<?php
namespace Pribi\Commands\Transactions\Rollbacks;

use Pribi\Executions\Executabling;
use Pribi\Transactions\Ends\Base\Finishable;
use Pribi\Transactions\Ends\Base\Finishing;
use Pribi\Commands\WithoutIdentifier;
use Pribi\Executions\Executable;

class Rollback extends WithoutIdentifier implements Finishable, Executable {
	use Finishing;
	use Executabling;

	protected function toSql() {
		return 'ROLLBACK';
	}
}
