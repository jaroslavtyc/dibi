<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Where;

class InnerJoinAlias extends JoinAlias {

	public function __construct(Identifier $alias, InnerJoin $prependInnerJoin) {
		parent::__construct($alias, $prependInnerJoin, $this->getCommandBuilder());
	}

	public function innerJoin($subject) {
		return $this->getCommandBuilder()->createAnyQueryInnerJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function leftJoin($subject) {
		return $this->getCommandBuilder()->createAnyQueryLeftJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
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
