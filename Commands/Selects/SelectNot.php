<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Selects\Base\BaseSelect;

/**
 * @method SelectAlias as ($alias)
 */
class SelectNot extends BaseSelect {
	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',NOT ' . $this->getIdentifier()->toSql();
		} else {
			return 'SELECT NOT ' . $this->getIdentifier()->toSql();
		}
	}

	protected function alias(Identifier $name) {
		return new SelectNotAlias($name, $this);
	}
}
