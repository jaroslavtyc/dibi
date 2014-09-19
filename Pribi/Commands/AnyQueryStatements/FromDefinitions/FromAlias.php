<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions;

class FromAlias extends \Pribi\Commands\Identifiers\IdentifierAlias implements \Pribi\Commands\AnyQueryStatements\FromDefinitions\Base\FromIdentifiable,
	\Pribi\Commands\AnyQueryStatements\WhereConditions\Parts\Whereable,
	\Pribi\Commands\AnyQueryStatements\Joins\Parts\Joinable,
	\Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable {

	use \Pribi\Commands\AnyQueryStatements\WhereConditions\Parts\Whereing;
	use \Pribi\Commands\AnyQueryStatements\Joins\Joining;
	use \Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;

	public function __construct(
		\Pribi\Commands\Identifiers\Identifier $alias,
		From $prependFrom,
		\Pribi\Builders\Commands\Builder $builder
	) {
		parent::__construct($alias, $prependFrom, $builder);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
