<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;
use Pribi\Executions\Executabling;

class Where extends WithIdentifier implements Comparison {
	use AndOring;
	use Comparing;
	use Limiting;
	use Executabling;

	protected function toSql() {
		return 'WHERE ' . $this->getIdentifier()->toSql();
	}
}
