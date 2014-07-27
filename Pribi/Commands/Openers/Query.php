<?php
namespace Pribi\Commands\Openers;

/**
 * Class Query
 * @package Pribi\Commands\Openers
 * @see http://dev.mysql.com/doc/refman/5.6/en/entering-queries.html
 */
class Query extends \Pribi\Commands\Command {
	public function __construct(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		parent::__construct($this, $commandsBuilder);
	}

	protected function toSql() {
		return '';
	}

	public function insertInto($table, $columns) {
		// INSERT INTO is not a part of main query commands because of lack of execution sense immediately after it
		return $this->getCommandBuilder()->createInsertInto(
			$this->getCommandBuilder()->createIdentifier($table),
			$this,
			$this->getCommandBuilder()->createIdentifiers($columns)
		);
	}

	public function insertIgnoreInto($table, $columns) {
		// INSERT IGNORE INTO is not a part of main query commands because of lack of execution sense immediately after it
		return $this->getCommandBuilder()->createInsertIgnoreInto(
			$this->getCommandBuilder()->createIdentifier($table),
			$this,
			$this->getCommandBuilder()->createIdentifiers($columns)
		);
	}

	public function select($subject) {
		return $this->getCommandBuilder()->createMainQuerySelect(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function update($subject) {
		return $this->getCommandBuilder()->createMainQueryUpdate(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function delete($subject) {
		return $this->getCommandBuilder()->createDelete(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}

	public function startTransaction() {
		return $this->getCommandBuilder()->createMainQueryStartTransaction($this);
	}

	public function begin() {
		return $this->getCommandBuilder()->createMainQueryBegin($this);
	}

	public function beginWork() {
		return $this->getCommandBuilder()->createMainQueryBeginWork($this);
	}

	public function commit() {
		return $this->getCommandBuilder()->createMainQueryCommit($this);
	}

	public function commitWork() {
		return $this->getCommandBuilder()->createMainQueryCommitWork($this);
	}

	public function disableAutocommit() {
		return $this->getCommandBuilder()->createMainQueryDisableAutocommit($this);
	}

	public function enableAutocommit() {
		return $this->getCommandBuilder()->createMainQueryEnableAutocommit($this);
	}

	public function rollback() {
		return $this->getCommandBuilder()->createMainQueryRollback($this);
	}

	public function rollbackWork() {
		return $this->getCommandBuilder()->createMainQueryRollbackWork($this);
	}
}
