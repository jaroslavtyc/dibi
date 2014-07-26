<?php
namespace Pribi\Commands\MainQueryStatements\Selects;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;
use Pribi\Commands\MainQueryStatements\Selects\Base\AfterSelecting;

class SelectAlias extends \Pribi\Commands\AnyQueryStatements\Selects\SelectAlias implements Executable {
	use AfterSelecting;
	use Executabling;

	public function __construct(Identifier $alias, Select $prependSelect) {
		parent::__construct($alias, $prependSelect);
	}
}
