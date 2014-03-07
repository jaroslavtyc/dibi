<?php
namespace Pribi\Commands\Conditions;

class Disjunction extends BaseOr {
	protected function toSql() {
		return 'OR ' . $this->getIdentifier()->toSql();
	}
}
