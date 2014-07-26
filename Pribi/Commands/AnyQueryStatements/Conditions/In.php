<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

class In extends Base\In {
	protected function toSql() {
		return 'IN (' . $this->identifiers->toSql() . ')';
	}
}
