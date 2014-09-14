<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions;

use Pribi\Commands\AnyQueryStatements\FromDefinitions\Base\FromIdentifiable;
use Pribi\Commands\Identifiers\IdentifierAlias;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\AnyQueryStatements\Joins\Base\Joinable;
use Pribi\Commands\Joins\Joining;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable;
use Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Base\Whereable;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Base\Whereing;

class FromAlias extends IdentifierAlias implements FromIdentifiable, Whereable, Joinable, Limitable {
	use \Pribi\Commands\AnyQueryStatements\WhereConditions\Base\Whereing;
	use Joining;
	use \Pribi\Commands\AnyQueryStatements\Limits\Base\Limiting;

	public function __construct(Identifier $alias, From $prependFrom) {
		parent::__construct($alias, $prependFrom);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
