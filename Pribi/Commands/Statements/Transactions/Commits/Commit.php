<?php
namespace Pribi\Commands\Transactions\Commits;

use Pribi\Commands\WithoutIdentifier;
use Pribi\Transactions\Ends\Base\Finishable;
use Pribi\Transactions\Ends\Base\Finishing;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Commit extends WithoutIdentifier implements Finishable, Executable {
	use Finishing;
	use Executabling;

	protected function toSql() {
		return 'COMMIT';
	}
}
