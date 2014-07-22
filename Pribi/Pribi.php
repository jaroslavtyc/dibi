<?php
namespace Pribi;

class Pribi {

	private $commandsBuilder;

	public function __construct(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		$this->commandsBuilder = $commandsBuilder;
	}

	public function query() {
		return $this->commandsBuilder->createQuery();
	}

	public function subcondition() {
		return $this->commandsBuilder->createSubcondition();
	}
}
