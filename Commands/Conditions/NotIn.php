<?php
namespace Pribi\Commands\Conditions;

class NotIn extends In {
	protected function toSql() {
		return 'NOT IN (' . $this->implodeIdentifiers() . ')';
	}
}
