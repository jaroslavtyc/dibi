<?php
namespace Pribi\Commands\MainQueryStatements\Selects;

class SelectAlias extends \Pribi\Commands\AnyQueryStatements\Selects\SelectAlias implements \Pribi\Executions\Executable {
	use \Pribi\Commands\MainQueryStatements\Selects\Base\AfterSelecting;
	use \Pribi\Executions\Executabling;

	public function __construct(
		\Pribi\Commands\Identifiers\Identifier $alias,
		Select $prependSelect,
		\Pribi\Builders\Commands\Builder $commandBuilder
	) {
		parent::__construct($alias, $prependSelect, $commandBuilder);
	}
}
