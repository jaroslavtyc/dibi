<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

use Pribi\Commands\AnyQueryStatements\Conditions\Base\In;

class NotIn extends In {
	protected function toSql() {
		return 'NOT IN (' . $this->implodeIdentifiers() . ')';
	}
}
