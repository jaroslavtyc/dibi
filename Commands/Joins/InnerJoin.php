<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;

/**
 * @method InnerJoinAlias as ($alias)
 */
class InnerJoin extends Join implements InnerJoinIdentity {
	protected function alias(Identifier $alias) {
		return new InnerJoinAlias($alias, $this);
	}

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',' . $this->getIdentifier()->toSql();
		} else {
			return 'INNER JOIN ' . $this->getIdentifier()->toSql();
		}
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
