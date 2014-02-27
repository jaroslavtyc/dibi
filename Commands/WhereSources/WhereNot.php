<?php
namespace Pribi\Commands\WhereSources;

class WhereNot extends Where {
	protected function toSql() {
		return 'WHERE NOT ' . $this->getIdentifier()->toSql();
	}
}
