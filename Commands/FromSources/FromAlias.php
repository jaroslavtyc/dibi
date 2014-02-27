<?php
namespace Pribi\Commands\FromSources;

use Pribi\Commands\Conditions\Limitable;
use Pribi\Commands\Conditions\Whereable;
use Pribi\Commands\Conditions\Whereing;
use Pribi\Commands\Identifiers\IdentifierAlias;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Joins\Joinable;
use Pribi\Commands\Joins\Joining;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;
use Pribi\Commands\Conditions\Limiting;

class FromAlias extends IdentifierAlias implements FromIdentifiable, Whereable, Joinable, Limitable, Executable {
	use Whereing;
	use Joining;
	use Limiting;
	use Executabling;

	public function __construct(Identifier $alias, From $prependFrom) {
		parent::__construct($alias, $prependFrom);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
