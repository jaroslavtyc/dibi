<?php
namespace Pribi\Commands\FromSources;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\IdentifierBringer;
use Pribi\Commands\Joins\Joinable;
use Pribi\Commands\Joins\Joining;
use Pribi\Commands\Conditions\Whereing;
use Pribi\Commands\Conditions\Limiting;
use Pribi\Executions\Executabling;

/**
 * @method FromAlias as ($alias)
 */
class From extends IdentifierBringer implements FromIdentity, Joinable {
	use Joining;
	use Whereing;
	use Limiting;
	use Executabling;

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',' . $this->getIdentifier()->toSql();
		} else {
			return 'FROM ' . $this->getIdentifier()->toSql();
		}
	}

	protected function alias(Identifier $alias) {
		return new FromAlias($alias, $this);
	}
}
