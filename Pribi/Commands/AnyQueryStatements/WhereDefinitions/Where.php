<?php
namespace Pribi\Commands\WhereDefinitions;

use Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOring;
use Pribi\Commands\AnyQueryStatements\Conditions\Base\AndOrUsable;
use Pribi\Commands\AnyQueryStatements\Conditions\Base\Comparable;
use Pribi\Commands\AnyQueryStatements\Conditions\Base\Comparing;
use Pribi\Commands\WithIdentifier;

class Where extends WithIdentifier implements AndOrUsable, Comparable {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return 'WHERE ' . $this->getIdentifier()->toSql();
	}
}
