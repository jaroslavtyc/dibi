<?php
namespace Pribi\Commands;

class UsingIdentificator extends FollowingCommand {
	private $identificator;

	public function __construct($identificator, Command $previousCommand) {
		$this->identificator = $identificator;
		parent::__construct($previousCommand);
	}

	public function getIdentificator() {
		return $this->identificator;
	}
}
