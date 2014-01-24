<?php
namespace Pribi\Commands;

abstract class WithIdentifier extends Command {
	private $identifier;

	public function __construct(Identifier $identifier, Command $previousCommand) {
		$this->identifier = $identifier;
		parent::__construct($previousCommand);
	}

	public function getIdentifier() {
		return $this->identifier;
	}
}
