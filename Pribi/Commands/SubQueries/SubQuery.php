<?php
namespace Pribi\Commands\SubQueries;

/**
 * Class SubQuery
 * @package Pribi\Commands\SubQueries
 * @see http://dev.mysql.com/doc/refman/5.1/en/subqueries.html
 */
class SubQuery extends \Pribi\Commands\Command {

	public function __construct(\Pribi\Builders\Commands\Builder $commandBuilder) {
		parent::__construct($this, $commandBuilder);
	}

	protected function toSql() {
		return '';
	}

	public function select($subject) {
		return $this->getCommandBuilder()->createAnyQuerySelect(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}
}
