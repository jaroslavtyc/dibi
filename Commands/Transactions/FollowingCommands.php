<?php
namespace Pribi\Commands\Transactions;

class FollowingCommands extends \Pribi\Core\Object {

	public function startTransaction() {
		$startTransaction = new StartTransaction($this);

		return $startTransaction;
	}

	public function withConsistentSnapshot() {
		$withConsistentSnapshot = new WithConsistentSnapshot($this);

		return $withConsistentSnapshot;
	}

	public function commit() {
		$commit = new Commit($this);

		return $commit;
	}

	public function andChain() {
		$andChain = new AndChain();

		return $andChain;
	}

	public function andNoChain() {
		$andNoChain = new AndNoChain();

		return $andNoChain;
	}
}
