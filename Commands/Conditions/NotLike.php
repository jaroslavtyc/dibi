<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class NotLike extends WithIdentifier {

	protected function toSql() {
		return 'NOT LIKE ' . $this->getIdentifier()->toSql();
	}
}
