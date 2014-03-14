<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\Like;

class Like extends Like {
	protected function toSql() {
		return 'LIKE ' . $this->getIdentifier()->toSql();
	}
}
