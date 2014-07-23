<?php
namespace Pribi\Commands\WhereDefinitions;

class WhereNot extends Where {
	protected function toSql() {
		return 'WHERE NOT ' . $this->getIdentifier()->toSql();
	}
}
