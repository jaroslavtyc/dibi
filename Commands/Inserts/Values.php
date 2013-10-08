<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\Executable;
use Pribi\Commands\FollowingCommand;

class Values extends FollowingCommand implements Executable {
	private $values;

	public function __construct($values, FollowingCommand $previousCommand) {
		$this->values = $values;
		parent::__construct($previousCommand);
	}

	public function onDuplicateKeyUpdate($expression) {
		return new OnDuplicateKeyUpdate($expression, $this);
	}
}
