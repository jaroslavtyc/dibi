<?php
namespace Pribi\Commands;

abstract class IdentifierAlias extends Command {
	private $alias;

	public function __construct(Identifier $alias, Command $previousCommand) {
		$this->alias = $alias;
		parent::__construct($previousCommand);
	}

	public function getIdentifier() {
		return $this->alias;
	}
}
