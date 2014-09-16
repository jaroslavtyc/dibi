<?php
namespace Pribi\Commands\AnyQueryStatements\Selects;

class SelectAlias extends Base\SelectAlias {
	/**
	 * Constructor with closely specified previous command, aliased Select respectively
	 *
	 * @param \Pribi\Commands\Identifiers\Identifier $alias
	 * @param Select $prependSelect
	 * @param \Pribi\Builders\Commands\Builder $commandBuilder
	 */
	public function __construct(
		\Pribi\Commands\Identifiers\Identifier $alias,
		Select $prependSelect,
		\Pribi\Builders\Commands\Builder $commandBuilder
	) {
		parent::__construct($alias, $prependSelect, $commandBuilder);
	}
}
