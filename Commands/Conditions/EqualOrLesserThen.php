<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\AndOring;
use Pribi\Commands\Conditions\Base\AndOrUsable;
use Pribi\Commands\WithIdentifier;

class EqualOrLesserThen extends WithIdentifier implements AndOrUsable {
	use AndOring;

	protected function toSql() {
		return '<= ' . $this->getIdentifier()->toSql();
	}
}
