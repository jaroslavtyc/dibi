<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions;

class FromAlias extends \Pribi\Commands\Identifiers\IdentifierAlias implements
	\Pribi\Commands\AnyQueryStatements\FromDefinitions\Parts\FromIdentifiable,
	\Pribi\Commands\AnyQueryStatements\WhereConditions\Parts\Whereable,
	\Pribi\Commands\AnyQueryStatements\Joins\Parts\Joinable,
	\Pribi\Commands\AnyQueryStatements\Limits\Base\Limitable {

	public function __construct(
		\Pribi\Commands\Identifiers\Identifier $alias,
		From $prependFrom,
		\Pribi\Builders\Commands\Builder $builder
	) {
		parent::__construct($alias, $prependFrom, $builder);
	}

	protected function toSql() {
		return 'AS ' . $this->getIdentifier()->toSql();
	}

	/**
	 * @param string $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Joins\InnerJoin
	 */
	public function innerJoin($subject) {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createAnyQueryInnerJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Joins\LeftJoin
	 */
	public function leftJoin($subject) {
		return $this->getCommandBuilder()->createAnyQueryLeftJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param $subject
	 * @return \Pribi\Commands\AnyQueryStatements\Joins\RightJoin
	 */
	public function rightJoin($subject) {
		return $this->getCommandBuilder()->createAnyQueryRightJoin(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param string $subject
	 * @return \Pribi\Commands\AnyQueryStatements\WhereConditions\Where
	 */
	public function where($subject) {
		return $this->getCommandBuilder()->createAnyQueryWhere(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param string $subject
	 * @return \Pribi\Commands\AnyQueryStatements\WhereConditions\WhereNot
	 */
	public function whereNot($subject) {
		return $this->getCommandBuilder()->createAnyQueryWhereNot(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	/**
	 * @param int $limit
	 * @return \Pribi\Commands\AnyQueryStatements\Limits\Limit
	 */
	public function limit($limit) {
		return $this->getCommandBuilder()->createAnyQueryLimit(0, $limit, $this);
	}

	/**
	 * @param int $offset
	 * @param int $limit
	 * @return \Pribi\Commands\AnyQueryStatements\Limits\Limit
	 */
	public function offsetAndLimit($offset, $limit) {
		return $this->getCommandBuilder()->createAnyQueryLimit($offset, $limit, $this);
	}
}
