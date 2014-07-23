<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;

class RightJoinAlias extends JoinAlias {
	public function __construct(Identifier $alias, LeftJoin $prependLeftJoin) {
		parent::__construct($alias, $prependLeftJoin);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
