<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Where;

/**
 * @method JoinAlias as ($alias)
 */
class InnerJoin extends Join implements \Pribi\Commands\AnyQueryStatements\Joins\Parts\InnerJoinIdentifiable {

	protected function toSql() {
		return 'INNER JOIN ' . $this->getIdentifier()->toSql();
	}

	protected function alias($aliasName) {
		return $this->getCommandBuilder()->createAnyQueryJoinAlias(
			$this->getCommandBuilder()->createIdentifier($aliasName),
			$this
		);
	}

	public function innerJoin($name) {
		return new InnerJoin(new Identifier($name), $this);
	}

	public function leftJoin($identificator) {
		return new LeftJoin($identificator, $this);
	}

	public function rightJoin($identificator) {
		return new RightJoin($identificator, $this);
	}

	public function where($identificator) {
		return new Where($identificator, $this);
	}

	public function limit($limit) {
		return new Limit(0, $limit);
	}

	public function offsetLimit($offset, $limit) {
		return new Limit($offset, $limit);
	}
}
