<?php
namespace Pribi\Commands\Selects;

use Pribi\Builders\CommandsBuilder;
use Pribi\Commands\Identifiers\Identifier;

class SelectAlias extends Base\SelectAlias {
	public function __construct(Identifier $alias, Select $prependSelect, CommandsBuilder $commandsBuilder) {
		parent::__construct($alias, $prependSelect, $commandsBuilder);
	}
}
