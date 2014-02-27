<?php
namespace Pribi\Commands\Conditions;

class NotLike extends Like {
	protected function toSql() {
		return 'NOT LIKE ' . $this->getIdentifier()->toSql();
	}
}
