<?php
namespace Pribi\Commands\FromDefinitions;

use Pribi\Commands\FromDefinitions\Base\FromIdentifiable;
use Pribi\Commands\Identifiers\IdentifierAlias;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Joins\Base\Joinable;
use Pribi\Commands\Joins\Joining;
use Pribi\Commands\Statements\Limits\Base\Limitable;
use Pribi\Commands\Statements\Limits\Base\Limiting;
use Pribi\Commands\WhereDefinitions\Base\Whereable;
use Pribi\Commands\WhereDefinitions\Base\Whereing;

class FromAlias extends IdentifierAlias implements FromIdentifiable, Whereable, Joinable, Limitable {
	use \Pribi\Commands\WhereDefinitions\Base\Whereing;
	use Joining;
	use \Pribi\Commands\Statements\Limits\Base\Limiting;

	public function __construct(Identifier $alias, From $prependFrom) {
		parent::__construct($alias, $prependFrom);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
