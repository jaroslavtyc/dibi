<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Conditions\Limitable;
use Pribi\Commands\Conditions\Limiting;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\IdentifierAlias;

class SelectAlias extends IdentifierAlias implements SelectIdentity, AfterSelect, Executable, Limitable {
	use AfterSelecting;
	use Executabling;
	use Limiting;

	public function __construct(Identifier $alias, Select $prependSelect) {
		parent::__construct($alias, $prependSelect);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
