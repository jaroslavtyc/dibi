<?php
namespace Pribi\Commands\Selects\Base;

use Pribi\Commands\Identifiers\IdentifierAlias;
use Pribi\Commands\Limits\Base\Limitable;
use Pribi\Commands\Limits\Base\Limiting;
use Pribi\Commands\Selects\Base\AfterSelecting;
use Pribi\Commands\Selects\Base\AfterSelectUsable;
use Pribi\Commands\Selects\Base\SelectIdentifiable;

abstract class BaseSelectAlias extends IdentifierAlias implements SelectIdentifiable, AfterSelectUsable, Limitable {
	use AfterSelecting;
	use \Pribi\Commands\Limits\Base\Limiting;

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
