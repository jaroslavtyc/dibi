<?php
namespace Pribi;

class Pribi {

	private $commandsBuilder;

	public function __construct(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		$this->commandsBuilder = $commandsBuilder;
	}

	public function createQuery() {
		return $this->commandsBuilder->createQuery();
	}

	public function craeteSubcondition() {
		return $this->commandsBuilder->createSubcondition();
	}
}
