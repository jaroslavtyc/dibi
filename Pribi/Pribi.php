<?php
namespace Pribi;

class Pribi {

	private $commandBuilder;

	public function __construct(\Pribi\Builders\Commands\Builder $commandBuilder) {
		$this->commandBuilder = $commandBuilder;
	}

	public function createOpeningQuery() {
		return $this->commandBuilder->createOpeningQuery();
	}

	public function createSubQuery() {
		return $this->commandBuilder->createSubQuery();
	}
}
