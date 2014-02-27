<?php
namespace Pribi\Commands\FromSources;

use Pribi\Commands\Conditions\Limitable;
use Pribi\Commands\Identifiers\IdentifierAlias;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Joins\Joinable;
use Pribi\Commands\Joins\Joining;
use Pribi\Commands\Conditions\Limiting;
use Pribi\Commands\WhereSources\Whereable;
use Pribi\Commands\WhereSources\Whereing;

class FromAlias extends IdentifierAlias implements FromIdentifiable, Whereable, Joinable, Limitable {
	use Whereing;
	use Joining;
	use Limiting;

	public function __construct(Identifier $alias, From $prependFrom) {
		parent::__construct($alias, $prependFrom);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
