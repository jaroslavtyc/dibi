<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\AndOrUsable;
use Pribi\Commands\WithIdentifier;

class EqualOrLesserThen extends WithIdentifier implements AndOrUsable {
	use AndOring;

	protected function toSql() {
		return '<= ' . $this->getIdentifier()->toSql();
	}
}
