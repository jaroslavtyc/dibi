<?php
namespace Pribi\Commands\Conditions;


class Like extends Base\Like {
	protected function toSql() {
		return 'LIKE ' . $this->getIdentifier()->toSql();
	}
}
