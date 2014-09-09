<?php
namespace Pribi;

class Pribi {

	private $commandBuilder;

	public function __construct(\Pribi\Builders\Commands\Builder $commandBuilder) {
		$this->commandBuilder = $commandBuilder;
	}

	public function openQuery() {
		return $this->commandBuilder->createQueryInitializer();
	}

	public function startSubQuery() {
		return $this->commandBuilder->createSubQuery();
	}
}
