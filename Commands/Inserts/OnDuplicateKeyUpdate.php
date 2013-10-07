<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\FollowingCommand;

class OnDuplicateKeyUpdate extends FollowingCommand {
	private $expression;

	public function __construct($expression, FollowingCommand $previousCommand) {
		$this->expression = $expression;
		parent::__construct($previousCommand);
	}
}
