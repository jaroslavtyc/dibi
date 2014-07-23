<?php
namespace Pribi\MainQueryCommands\Updates;

use Pribi\Commands\WithIdentifier;

class UpdateAlias extends WithIdentifier implements Base\AfterUpdateUsable, Base\UpdateIdentifiable {
	use Base\AfterUpdating;

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
