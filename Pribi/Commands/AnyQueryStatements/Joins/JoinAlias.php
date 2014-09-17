<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

abstract class JoinAlias extends \Pribi\Commands\Identifiers\IdentifierAlias {

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}

	public function on($subject) {
		return $this->getCommandBuilder()->createAnyQueryOn(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}
}
