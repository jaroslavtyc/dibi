<?php
namespace Pribi\Commands\AnyQueryStatements\Selects;

use Pribi\Builders\Commands\Builder;
use Pribi\Commands\Identifiers\Identifier;

class SelectAlias extends Base\SelectAlias {
	/**
	 * Constructor with closely specified PreviousCommand, respectively aliased Select
	 *
	 * @param Identifier $alias
	 * @param Select $prependSelect
	 * @param CommandBuilder $commandBuilder
	 */
	public function __construct(Identifier $alias, Select $prependSelect, CommandBuilder $commandBuilder) {
		parent::__construct($alias, $prependSelect, $commandBuilder);
	}
}
