<?php
namespace Pribi\Commands\AnyQueryStatements\Selects;

use Pribi\Commands\Identifiers\Identifier;

/**
 * @method SelectAlias as ($alias)
 */
class Select extends Base\Select {
	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',' . $this->getIdentifier()->toSql();
		} else {
			return 'SELECT ' . $this->getIdentifier()->toSql();
		}
	}

	/**
	 * @param Identifier $alias
	 * @return \Pribi\Commands\Command|SelectAlias
	 */
	protected function alias(Identifier $alias) {
		return $this->getCommandBuilder()->createSelectAlias($alias, $this);
	}
}
