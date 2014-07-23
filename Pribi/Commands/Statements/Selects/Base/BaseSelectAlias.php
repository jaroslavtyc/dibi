<?php
namespace Pribi\Commands\Statements\Selects\Base;

use Pribi\Commands\Identifiers\IdentifierAlias;
use Pribi\Commands\Statements\Limits\Base\Limitable;
use Pribi\Commands\Statements\Limits\Base\Limiting;
use Pribi\Commands\Statements\Selects\Base\AfterSelecting;

abstract class SelectAlias extends IdentifierAlias implements SelectIdentifiable, AfterSelectUsable, Limitable {
	use AfterSelecting;
	use Limiting;

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
