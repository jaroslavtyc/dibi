<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\FollowingCommand;

class Set extends FollowingCommand {
	private $values;

	public function __construct($values, FollowingCommand $previousCommand) {
		$this->values = $values;
		parent::__construct($previousCommand);
	}

	public function onDuplicateKeyUpdate($expression) {
		return new OnDuplicateKeyUpdate($expression, $this);
	}
}
