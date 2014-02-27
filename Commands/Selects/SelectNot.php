<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Limits\Limitable;
use Pribi\Commands\Limits\Limiting;

/**
 * @method SelectAlias as ($alias)
 */
class SelectNot extends Select implements SelectIdentifiable, Limitable {
	use AfterSelecting;
	use Limiting;

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',NOT ' . $this->getIdentifier()->toSql();
		} else {
			return 'SELECT NOT ' . $this->getIdentifier()->toSql();
		}
	}
}
