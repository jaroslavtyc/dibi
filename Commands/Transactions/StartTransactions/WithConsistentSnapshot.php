<?php
namespace Pribi\Commands\Transactions\StartTransactions;

use Pribi\Commands\WithoutIdentifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

/**
 * The WITH CONSISTENT SNAPSHOT option starts a consistent read for storage engines that are capable of it.
 * This applies only to InnoDB. The effect is the same as issuing a START TRANSACTION followed by a SELECT from any InnoDB table.
 * @see http://dev.mysql.com/doc/refman/5.0/en/innodb-consistent-read.html
 */
class WithConsistentSnapshot extends WithoutIdentifier implements Executable {
	use Executabling;

	protected function toSql() {
		return 'WITH CONSISTENT SNAPSHOT';
	}
}
