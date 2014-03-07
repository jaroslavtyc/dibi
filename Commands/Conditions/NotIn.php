<?php
namespace Pribi\Commands\Conditions;

class NotIn extends BaseIn {
	protected function toSql() {
		return 'NOT IN (' . $this->implodeIdentifiers() . ')';
	}
}
