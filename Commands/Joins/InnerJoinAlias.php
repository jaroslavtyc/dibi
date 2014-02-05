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

	public function innerJoin($identificator) {
		return new InnerJoin($identificator, $this);
	}

	public function leftJoin($name) {
		return new LeftJoin(new Identifier($name), $this);
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
