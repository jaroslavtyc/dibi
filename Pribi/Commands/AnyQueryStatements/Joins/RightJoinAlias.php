<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

class RightJoinAlias extends JoinAlias {

	public function __construct(\Pribi\Commands\Identifiers\Identifier $aliasIdentifier, RightJoin $prependRightJoin) {
		parent::__construct($aliasIdentifier, $prependRightJoin, $this->getCommandBuilder());
	}
}
