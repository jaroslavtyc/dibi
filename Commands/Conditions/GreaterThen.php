<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class GreaterThen extends WithIdentifier {
	use AndOring;

	protected function toSql() {
		return '> ' . $this->getIdentifier()->toSql();
	}
}
