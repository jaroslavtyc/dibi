<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\BaseNull;

class IsNotNull extends BaseNull {
	protected function toSql() {
		return 'IS NOT NULL';
	}
}
