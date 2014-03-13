<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\BaseIn;

class NotIn extends BaseIn {
	protected function toSql() {
		return 'NOT IN (' . $this->implodeIdentifiers() . ')';
	}
}
