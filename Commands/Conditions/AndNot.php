<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class AndNot extends WithIdentifier {

	protected function toSql() {
		return 'AND NOT ' . $this->getIdentifier()->toSql();
	}
}
