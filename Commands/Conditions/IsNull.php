<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithoutIdentifier;

class IsNull extends WithoutIdentifier {
	use AndOring;

	protected function toSql() {
		return 'IS NULL';
	}
}
