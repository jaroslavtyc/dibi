<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

/**
 * @method JoinAlias as ($alias)
 */
abstract class Join extends \Pribi\Commands\IdentifierBringer {

	public function on($subject) {
		$this->getCommandBuilder()->createAnyQueryOn(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}
}
