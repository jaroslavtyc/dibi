<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class OrNot extends WithIdentifier {

	protected function toSql() {
		return 'OR NOT ' . $this->getIdentifier()->toSql();
	}
}
