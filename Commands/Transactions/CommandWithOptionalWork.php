<?php
namespace Pribi\Commands\Transactions;

class CommandWithOptionalWork extends Command {

	private $work;

	public function __construct(FollowingCommands $followingCommands, $work = NULL) {
		parent::__construct($followingCommands);
		$this->work = $work;
	}
}
