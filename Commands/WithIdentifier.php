<?php
namespace Pribi\Commands;

use Pribi\Commands\Identifiers\Identifier;

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
