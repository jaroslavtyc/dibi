<?php
namespace Pribi\MainQueryCommands\Conditions;

class AndNot extends Conjunction {
	protected function toSql() {
		return 'AND NOT ' . $this->getIdentifier()->toSql();
	}
}
