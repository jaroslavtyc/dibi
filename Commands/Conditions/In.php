<?php
namespace Pribi\Commands\Conditions;

class In extends BaseIn {
	protected function toSql() {
		return 'IN (' . $this->identifiers->toSql() . ')';
	}
}
