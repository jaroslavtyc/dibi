<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\BaseNull;

class IsNull extends BaseNull {
	protected function toSql() {
		return 'IS NULL';
	}
}
