<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\BaseLike;

class Like extends BaseLike {
	protected function toSql() {
		return 'LIKE ' . $this->getIdentifier()->toSql();
	}
}
