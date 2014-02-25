<?php
namespace Pribi\Commands\Selects;

use Pribi\Commands\Conditions\Limitable;
use Pribi\Commands\Conditions\Limiting;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;
use Pribi\Commands\Identifiers\Identifier;

/**
 * @method SelectAlias as ($alias)
 */
class SelectNot extends Select implements SelectIdentity, Limitable, Executable {
	use AfterSelecting;
	use Limiting;
	use Executabling;

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',NOT ' . $this->getIdentifier()->toSql();
		} else {
			return 'SELECT NOT ' . $this->getIdentifier()->toSql();
		}
	}
}
