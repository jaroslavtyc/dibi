<?php
namespace Pribi\MainQueryCommands\Updates;

use Pribi\Commands\WithIdentifier;

class EqualTo extends WithIdentifier {
	protected function toSql() {
		return '= ' . $this->getIdentifier()->toSql();
	}
}
