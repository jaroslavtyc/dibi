<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\BaseIn;

class In extends BaseIn {
	protected function toSql() {
		return 'IN (' . $this->identifiers->toSql() . ')';
	}
}
