<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithoutIdentifier;

class IsNotNull extends WithoutIdentifier {
use AndOring;

protected function toSql() {
	return 'IS NOT NULL';
}
}
