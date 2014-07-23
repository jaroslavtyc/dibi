<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\Null;

class IsNull extends Null {
	protected function toSql() {
		return 'IS NULL';
	}
}
