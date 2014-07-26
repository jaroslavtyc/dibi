<?php
namespace Pribi\Commands\AnyQueryStatements\Selects\Base;

use Pribi\Commands\Identifiers\IdentifierAlias;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;
use Pribi\Commands\AnyQueryStatements\Selects\Base\AfterSelecting;

abstract class SelectAlias extends IdentifierAlias implements SelectIdentifiable, AfterSelectUsable, Limitable {
	use AfterSelecting;
	use Limiting;

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
