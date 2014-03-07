<?php
namespace Pribi\Commands\Conditions;

class Like extends BaseLike {
	protected function toSql() {
		return 'LIKE ' . $this->getIdentifier()->toSql();
	}
}
