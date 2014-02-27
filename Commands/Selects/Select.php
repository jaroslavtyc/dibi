<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Conditions\Limitable;
use Pribi\Commands\Conditions\Limiting;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\IdentifierBringer;

/**
 * @method SelectAlias as ($alias)
 */
class Select extends IdentifierBringer implements SelectIdentifiable, AfterSelectUsable, Limitable, Executable {
	use AfterSelecting;
	use Limiting;
	use Executabling;

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',' . $this->getIdentifier()->toSql();
		} else {
			return 'SELECT ' . $this->getIdentifier()->toSql();
		}
	}

	protected function alias(Identifier $alias) {
		return new SelectAlias($alias, $this);
	}
}
