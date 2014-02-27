<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\AndOrUsable;
use Pribi\Commands\WithIdentifier;

class Like extends WithIdentifier implements AndOrUsable {
	use AndOring;

	protected function toSql() {
		return 'LIKE ' . $this->getIdentifier()->toSql();
	}
}
