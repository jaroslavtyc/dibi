<?php
namespace Pribi\Commands\Conditions;

class In extends Base\In {
	protected function toSql() {
		return 'IN (' . $this->identifiers->toSql() . ')';
	}
}
