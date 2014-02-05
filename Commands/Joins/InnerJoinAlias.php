<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;

class InnerJoinAlias extends JoinAlias {
	public function __construct(Identifier $alias, InnerJoin $prependInnerJoin) {
		parent::__construct($alias, $prependInnerJoin);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
