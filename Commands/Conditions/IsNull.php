<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithoutIdentifier;

class IsNull extends WithoutIdentifier implements AndOrUsable {
	use AndOring;

	protected function toSql() {
		return 'IS NULL';
	}
}
