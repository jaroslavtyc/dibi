<?php
namespace Pribi\Commands\MainQueryStatements\Joins;

/**
 * @method JoinAlias as ($alias)
 */
class RightJoin extends \Pribi\Commands\AnyQueryStatements\Joins\RightJoin  implements JoinLike {

	use \Pribi\Executions\Executabling;

	protected function alias($aliasName) {
		$this->getCommandBuilder()->createMainQueryJoinAlias(
			$this->getCommandBuilder()->createIdentifier($aliasName),
			$this
		);
	}

}
