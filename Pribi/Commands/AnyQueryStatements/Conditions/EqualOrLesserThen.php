<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

use Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOring;
use Pribi\Commands\AnyQueryStatements\Conditions\Parts\AndOrUsable;
use Pribi\Commands\WithIdentifier;

class EqualOrLesserThen extends WithIdentifier implements AndOrUsable {
	use AndOring;

	protected function toSql() {
		return '<= ' . $this->getIdentifier()->toSql();
	}
}
