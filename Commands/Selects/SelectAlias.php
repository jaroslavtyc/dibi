<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\IdentifierAlias;
use Pribi\Commands\Limits\Limitable;
use Pribi\Commands\Limits\Limiting;

class SelectAlias extends IdentifierAlias implements SelectIdentifiable, AfterSelectUsable, Limitable {
	use AfterSelecting;
	use Limiting;

	public function __construct(Identifier $alias, Select $prependSelect) {
		parent::__construct($alias, $prependSelect);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
