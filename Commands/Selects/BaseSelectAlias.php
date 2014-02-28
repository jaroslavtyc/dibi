<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Identifiers\IdentifierAlias;
use Pribi\Commands\Limits\Limitable;
use Pribi\Commands\Limits\Limiting;

abstract class BaseSelectAlias extends IdentifierAlias implements SelectIdentifiable, AfterSelectUsable, Limitable {
	use AfterSelecting;
	use Limiting;

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
