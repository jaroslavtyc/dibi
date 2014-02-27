<?php
namespace Pribi\Commands\Conditions;

class IsNotNull extends IsNull {
	protected function toSql() {
		return 'IS NOT NULL';
	}
}
