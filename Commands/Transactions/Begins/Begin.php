<?php
namespace Pribi\Commands\Transactions\Begins;
use Pribi\Commands\Transactions\Command;

class Begin extends Command {
	public function commit() {
		return $this->getFollowingCommands()->commit();
	}
}
