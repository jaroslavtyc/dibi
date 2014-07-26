<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;


class Like extends Base\Like {
	protected function toSql() {
		return 'LIKE ' . $this->getIdentifier()->toSql();
	}
}
