<?php
namespace Pribi\Commands;

abstract class IdentifierAlias extends Command {
	private $alias;

	public function __construct($alias, Command $previousCommand) {
		$this->alias = $alias;
		parent::__construct($previousCommand);
	}

	public function getIdentificator() {
		return $this->alias;
	}
}
