<?php
namespace Pribi\Commands\Conditions;

class AndNot extends Conjunction {
	protected function toSql() {
		return 'AND NOT ' . $this->getIdentifier()->toSql();
	}
}
