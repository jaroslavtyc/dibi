<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions;

/**
 * @method FromAlias as ($alias)
 */
class From extends \Pribi\Commands\IdentifierBringer implements \Pribi\Commands\AnyQueryStatements\FromDefinitions\Base\FromIdentifiable,
	\Pribi\Commands\AnyQueryStatements\Joins\Base\Joinable,
	\Pribi\Commands\AnyQueryStatements\WhereConditions\Base\Whereable,
	\Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable {

	use \Pribi\Commands\AnyQueryStatements\Joins\Joining;
	use \Pribi\Commands\AnyQueryStatements\WhereConditions\Base\Whereing;
	use \Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',' . $this->getIdentifier()->toSql();
		} else {
			return 'FROM ' . $this->getIdentifier()->toSql();
		}
	}

	protected function alias(\Pribi\Commands\Identifiers\Identifier $alias) {
		return new FromAlias($alias, $this);
	}
}
