<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Limits\Base\Limiting;
use Pribi\Commands\Selects\Base\BaseSelect;

/**
 * @method SelectAlias as ($alias)
 */
class Select extends BaseSelect {
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
