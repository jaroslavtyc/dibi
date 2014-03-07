<?php
namespace Pribi\Commands\Conditions;

class NotLike extends BaseLike {
	protected function toSql() {
		return 'NOT LIKE ' . $this->getIdentifier()->toSql();
	}
}
