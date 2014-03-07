<?php
namespace Pribi\Commands\Conditions;

class OrNot extends BaseOr {
	protected function toSql() {
		return 'OR NOT ' . $this->getIdentifier()->toSql();
	}
}
