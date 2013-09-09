<?php
namespace Pribi\Commands\Transactions\StartTransactions;
use Pribi\Commands\FollowingCommand;
use Pribi\Commands\Transactions\Commits\Commit;
use Pribi\Commands\Transactions\CommitWorks\CommitWork;

/**
 * With START TRANSACTION, autocommit remains disabled until you end the transaction with COMMIT or ROLLBACK.
 * The autocommit mode then reverts to its previous state.
 * @see http://dev.mysql.com/doc/refman/5.0/en/commit.html
 */
class StartTransaction extends FollowingCommand {
	/**
	 * The WITH CONSISTENT SNAPSHOT option starts a consistent read for storage engines that are capable of it.
	 * This applies only to InnoDB. The effect is the same as issuing a START TRANSACTION followed by a SELECT from any InnoDB table.
	 * @see http://dev.mysql.com/doc/refman/5.0/en/innodb-consistent-read.html
	 */
	public function withConsistentSnapshot() {
		$withConsistentSnapshot = new WithConsistentSnapshot($this);

		return $withConsistentSnapshot;
	}

	public function commit() {
		$commit = new Commit($this);

		return $commit;
	}

	public function commitWork() {
		$commit = new CommitWork($this);

		return $commit;
	}
}
