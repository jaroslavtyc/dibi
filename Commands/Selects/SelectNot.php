<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Identifiers\Identifier;

/**
 * @method SelectAlias as ($alias)
 */
class SelectNot extends Base\Select {
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
