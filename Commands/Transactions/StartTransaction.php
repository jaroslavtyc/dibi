<?php
namespace Pribi\Commands\Transactions;

/**
 * With START TRANSACTION, autocommit remains disabled until you end the transaction with COMMIT or ROLLBACK.
 * The autocommit mode then reverts to its previous state.
 * @see http://dev.mysql.com/doc/refman/5.0/en/commit.html
 */
class StartTransaction extends StartTransactionBase implements Command {
	/**
	 * The WITH CONSISTENT SNAPSHOT option starts a consistent read for storage engines that are capable of it.
	 * This applies only to InnoDB. The effect is the same as issuing a START TRANSACTION followed by a SELECT from any InnoDB table.
	 * @see http://dev.mysql.com/doc/refman/5.0/en/innodb-consistent-read.html
	 */
	public function withConsistentSnapshot() {
		return $this->getFollowingCommands()->withConsistentSnapshot();
	}
}
