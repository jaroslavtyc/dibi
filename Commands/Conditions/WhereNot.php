<?php
namespace Pribi\Commands\Conditions;

use Pribi\Executions\Executabling;

class WhereNot extends Where {
	protected function toSql() {
		return 'WHERE NOT ' . $this->getIdentifier()->toSql();
	}
}
