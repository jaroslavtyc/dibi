<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class EqualOrGreaterThen extends WithIdentifier {
	use AndOring;

	protected function toSql() {
		return '>= ' . $this->getIdentifier()->toSql();
	}
}
