<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

abstract class JoinAlias extends \Pribi\Commands\Identifiers\IdentifierAlias {

	public function on($subject) {
		return $this->getCommandBuilder()->createAnyQueryOn(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}
}
