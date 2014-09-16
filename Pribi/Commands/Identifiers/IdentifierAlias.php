<?php
namespace Pribi\Commands\Identifiers;

abstract class IdentifierAlias extends \Pribi\Commands\Command {
	private $alias;

	public function __construct(
		Identifier $alias,
		\Pribi\Commands\Command $previousCommand,
		\Pribi\Builders\Commands\Builder $commandBuilder
	) {
		$this->alias = $alias;
		parent::__construct($previousCommand, $commandBuilder);
	}

	/**
	 * @return Identifier
	 */
	protected function getIdentifier() {
		return $this->alias;
	}
}
