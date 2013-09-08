<?php
namespace Pribi\Commands\Transactions;
use Pribi\Core\Object;

class FollowingCommands extends Object {
	public function startTransaction() {
		$startTransaction = new StartTransactions\StartTransaction($this);

		return $startTransaction;
	}

	public function withConsistentSnapshot() {
		$withConsistentSnapshot = new StartTransactions\WithConsistentSnapshot($this);

		return $withConsistentSnapshot;
	}

	public function begin() {
		$begin = new Begins\Begin($this);

		return $begin;
	}

	public function beginWork() {
		$beginWork = new Begins\BeginWork($this);

		return $beginWork;
	}

	public function commit() {
		$commit = new Commits\Commit($this);

		return $commit;
	}

	public function commitWork() {
		$commitWork = new Commits\CommitWork($this);

		return $commitWork;
	}

	public function andChain() {
		$andChain = new Commits\AndChain($this);

		return $andChain;
	}

	public function andNoChain() {
		$noChain = new Commits\AndNoChain($this);

		return $noChain;
	}

	public function chain() {
		$chain = new Commits\Chain($this);

		return $chain;
	}

	public function noRelease() {
		$noRelease = new Commits\NoRelease($this);

		return $noRelease;
	}

	public function release() {
		$release = new Commits\Release($this);

		return $release;
	}

	public function rollback() {
		$rollback = new Rollbacks\Rollback($this);

		return $rollback;
	}

	public function andRollbackChain() {
		$andRollbackChain = new Rollbacks\AndChain($this);

		return $andRollbackChain;
	}

	public function andRollbackNoChain() {
		$andRollbackNoChain = new Rollbacks\AndNoChain($this);

		return $andRollbackNoChain;
	}

	public function rollbackRelease() {
		$release = new Rollbacks\Release($this);

		return $release;
	}

	public function rollbackNoRelease() {
		$noRelease = new Rollbacks\NoRelease($this);

		return $noRelease;
	}
}
