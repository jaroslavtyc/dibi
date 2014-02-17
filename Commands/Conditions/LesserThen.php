<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class LesserThen extends WithIdentifier {
	use AndOring;
	use Comparing;

	protected function toSql() {
		return '< ' . $this->getIdentifier()->toSql();
	}
}
