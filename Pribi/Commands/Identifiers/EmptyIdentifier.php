<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Commands\QueryPart;

class EmptyIdentifier extends QueryPart {
	protected function toSql() {
		return '';
	}
}
 