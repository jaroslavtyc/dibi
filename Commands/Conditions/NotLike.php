<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\Like;

class NotLike extends Like {
	protected function toSql() {
		return 'NOT LIKE ' . $this->getIdentifier()->toSql();
	}
}
