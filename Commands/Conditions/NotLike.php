<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\BaseLike;

class NotLike extends BaseLike {
	protected function toSql() {
		return 'NOT LIKE ' . $this->getIdentifier()->toSql();
	}
}
