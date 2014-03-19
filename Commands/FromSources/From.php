<?php
namespace Pribi\Commands\FromSources;

use Pribi\Commands\FromSources\Base\FromIdentifiable;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\IdentifierBringer;
use Pribi\Commands\Joins\Base\Joinable;
use Pribi\Commands\Joins\Joining;
use Pribi\Commands\Limits\Base\Limitable;
use Pribi\Commands\Limits\Base\Limiting;
use Pribi\Commands\WhereSources\Base\Whereable;
use Pribi\Commands\WhereSources\Base\Whereing;

/**
 * @method FromAlias as ($alias)
 */
class From extends IdentifierBringer implements FromIdentifiable, Joinable, Whereable, Limitable {
	use Joining;
	use \Pribi\Commands\WhereSources\Base\Whereing;
	use \Pribi\Commands\Limits\Base\Limiting;

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
