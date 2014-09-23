<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

class In extends Parts\In {
	protected function toSql() {
		return 'IN (' . $this->identifiers->toSql() . ')';
	}
}
