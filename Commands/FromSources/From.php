<?php
namespace Pribi\Commands\FromSources;

use Pribi\Commands\Conditions\Limitable;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\IdentifierBringer;
use Pribi\Commands\Joins\Joinable;
use Pribi\Commands\Joins\Joining;
use Pribi\Commands\Conditions\Limiting;
use Pribi\Commands\WhereSources\Whereable;
use Pribi\Commands\WhereSources\Whereing;

/**
 * @method FromAlias as ($alias)
 */
class From extends IdentifierBringer implements FromIdentifiable, Joinable, Whereable, Limitable {
	use Joining;
	use Whereing;
	use Limiting;

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
