<?php
namespace Pribi\Commands\FromDefinitions;

use Pribi\Commands\FromDefinitions\Base\FromIdentifiable;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\IdentifierBringer;
use Pribi\Commands\Joins\Base\Joinable;
use Pribi\Commands\Joins\Joining;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;
use Pribi\Commands\WhereDefinitions\Base\Whereable;
use Pribi\Commands\WhereDefinitions\Base\Whereing;

/**
 * @method FromAlias as ($alias)
 */
class From extends IdentifierBringer implements FromIdentifiable, Joinable, Whereable, Limitable {
	use Joining;
	use \Pribi\Commands\WhereDefinitions\Base\Whereing;
	use \Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;

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
