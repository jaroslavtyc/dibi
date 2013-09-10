<?php
namespace Pribi\Commands;

abstract class IdentificatorAlias extends FollowingCommand {
	private $alias;

	public function __construct($alias, Command $previousCommand) {
		$this->alias = $alias;
		parent::__construct($previousCommand);
	}

	public function getIdentificator() {
		return $this->alias;
	}
}
