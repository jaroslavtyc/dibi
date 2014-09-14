<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions;

class WhereNot extends Where {
	protected function toSql() {
		return 'WHERE NOT ' . $this->getIdentifier()->toSql();
	}
}
