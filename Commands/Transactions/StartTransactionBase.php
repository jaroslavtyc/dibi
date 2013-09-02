<?php
namespace Pribi\Commands\Transactions;
use Pribi\Commands\CommandWithoutIdentificator;

class StartTransactionBase extends CommandWithoutIdentificator {
	public function commit() {
		return $this->getFollowingCommands()->commit();
	}
}
