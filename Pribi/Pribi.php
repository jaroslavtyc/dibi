<?php
namespace Pribi;

class Pribi {

	private $commandBuilder;

	public function __construct(\Pribi\Builders\CommandBuilder $commandBuilder) {
		$this->commandBuilder = $commandBuilder;
	}

	public function createQuery() {
		return $this->commandBuilder->createQuery();
	}

	public function createSubQuery() {
		return $this->commandBuilder->createSubQuery();
	}
}
