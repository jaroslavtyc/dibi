<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\BaseOr;

class OrNot extends BaseOr {
	protected function toSql() {
		return 'OR NOT ' . $this->getIdentifier()->toSql();
	}
}
