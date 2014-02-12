<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\WithIdentifier;

class DifferentTo extends WithIdentifier {
	use AndOring;

	protected function toSql() {
		return '!= ' . $this->getIdentifier()->toSql();
	}
}
