<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\In;

class NotIn extends In {
	protected function toSql() {
		return 'NOT IN (' . $this->implodeIdentifiers() . ')';
	}
}
