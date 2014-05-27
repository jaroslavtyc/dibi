<?php
namespace Pribi\Commands\FromSources;

use Pribi\Commands\FromSources\Base\FromIdentifiable;
use Pribi\Commands\Identifiers\IdentifierAlias;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Joins\Base\Joinable;
use Pribi\Commands\Joins\Joining;
use Pribi\Commands\Limits\Base\Limitable;
use Pribi\Commands\Limits\Base\Limiting;
use Pribi\Commands\WhereSources\Base\Whereable;
use Pribi\Commands\WhereSources\Base\Whereing;

class FromAlias extends IdentifierAlias implements FromIdentifiable, Whereable, Joinable, Limitable {
	use \Pribi\Commands\WhereSources\Base\Whereing;
	use Joining;
	use \Pribi\Commands\Limits\Base\Limiting;

	public function __construct(Identifier $alias, From $prependFrom) {
		parent::__construct($alias, $prependFrom);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
