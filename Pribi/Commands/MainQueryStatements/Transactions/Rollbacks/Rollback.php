<?php
namespace Pribi\Commands\MainQueryStatements\Transactions\Rollbacks;

class Rollback extends \Pribi\Commands\WithoutIdentifier implements \Pribi\Transactions\Ends\Base\Finishable, \Pribi\Executions\Executable {
	use \Pribi\Transactions\Ends\Base\Finishing;
	use \Pribi\Executions\Executabling;

	protected function toSql() {
		return 'ROLLBACK';
	}
}
