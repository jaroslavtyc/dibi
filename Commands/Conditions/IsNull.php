<?php
namespace Pribi\Commands\Conditions;

class IsNull extends BaseNull {
	protected function toSql() {
		return 'IS NULL';
	}
}
