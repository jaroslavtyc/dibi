<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\AndOrUsable;
use Pribi\Commands\WithIdentifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class Where extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'WHERE ' . $this->getIdentifier()->toSql();
	}
}
