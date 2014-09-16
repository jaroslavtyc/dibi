<?php
namespace Pribi\Commands\AnyQueryStatements\Selects;

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
	 * @param string $aliasName
	 * @return SelectAlias
	 */
	protected function alias($aliasName) {
		return $this->getCommandBuilder()->createAnyQuerySelectAlias(
			$this->getCommandBuilder()->createIdentifier($aliasName),
			$this
		);
	}
}
