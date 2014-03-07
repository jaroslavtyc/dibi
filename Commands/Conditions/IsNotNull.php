<?php
namespace Pribi\Commands\Conditions;

class IsNotNull extends BaseNull {
	protected function toSql() {
		return 'IS NOT NULL';
	}
}
