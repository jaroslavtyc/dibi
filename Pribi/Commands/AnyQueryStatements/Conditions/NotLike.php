<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

use Pribi\Commands\AnyQueryStatements\Conditions\Base\Like;

class NotLike extends Like {
	protected function toSql() {
		return 'NOT LIKE ' . $this->getIdentifier()->toSql();
	}
}
