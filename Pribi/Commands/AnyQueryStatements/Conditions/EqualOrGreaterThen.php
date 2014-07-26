<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

use Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOring;
use Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOrUsable;
use Pribi\Commands\WithIdentifier;

class EqualOrGreaterThen extends WithIdentifier implements AndOrUsable {
	use AndOring;

	protected function toSql() {
		return '>= ' . $this->getIdentifier()->toSql();
	}
}
