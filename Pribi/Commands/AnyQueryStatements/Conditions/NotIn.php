<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

use Pribi\Commands\AnyQueryStatements\Conditions\Parts\In;

class NotIn extends In {
	protected function toSql() {
		return 'NOT IN (' . $this->implodeIdentifiers() . ')';
	}
}
