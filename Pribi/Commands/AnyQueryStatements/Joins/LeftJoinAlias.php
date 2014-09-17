<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

class LeftJoinAlias extends JoinAlias {

	public function __construct(\Pribi\Commands\Identifiers\Identifier $aliasIdentifier, LeftJoin $prependLeftJoin) {
		parent::__construct($aliasIdentifier, $prependLeftJoin, $this->getCommandBuilder());
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}
}
