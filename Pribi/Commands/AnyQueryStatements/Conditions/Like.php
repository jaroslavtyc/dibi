<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;


class Like extends Parts\Like {
	protected function toSql() {
		return 'LIKE ' . $this->getIdentifier()->toSql();
	}
}
