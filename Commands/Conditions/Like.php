<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class Like extends WithIdentifier {

	protected function toSql() {
		return 'LIKE ' . $this->getIdentifier()->toSql();
	}
}
