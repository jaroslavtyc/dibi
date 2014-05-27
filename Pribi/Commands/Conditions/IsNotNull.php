<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\Null;

class IsNotNull extends Null {
	protected function toSql() {
		return 'IS NOT NULL';
	}
}
