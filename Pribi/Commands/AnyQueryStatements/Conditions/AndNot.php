<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

class AndNot extends Conjunction {

	protected function toSql() {
		return 'AND NOT ' . $this->getIdentifier()->toSql();
	}

}
