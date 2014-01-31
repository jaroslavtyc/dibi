<?php
namespace Pribi\Commands\Identifiers;

abstract class IdentifierAlias extends Command {
	private $alias;

	public function __construct(Identifier $alias, Command $previousCommand) {
		$this->alias = $alias;
		parent::__construct($previousCommand);
	}

	/**
	 * @return Identifier
	 */
	public function getIdentifier() {
		return $this->alias;
	}
}
