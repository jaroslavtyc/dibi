<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\In;

class In extends In {
	protected function toSql() {
		return 'IN (' . $this->identifiers->toSql() . ')';
	}
}
