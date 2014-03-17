<?php
namespace Pribi\Commands\Updates;

use Pribi\Commands\Updates\Base\AfterUpdating;
use Pribi\Commands\WithIdentifier;

class UpdateAlias extends WithIdentifier implements Base\AfterUpdateUsable, Base\UpdateIdentifiable {
	use AfterUpdating;

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
