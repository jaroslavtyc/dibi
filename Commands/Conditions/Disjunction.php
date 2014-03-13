<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Conditions\Base\BaseOr;

class Disjunction extends BaseOr {
	protected function toSql() {
		return 'OR ' . $this->getIdentifier()->toSql();
	}
}
