<?php
namespace Pribi\Commands\Openers;

class Query extends \Pribi\Commands\Command {
	public function __construct(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		parent::__construct($this, $commandsBuilder);
	}

	protected function toSql() {
		return '';
	}

	public function insertInto($table, $columns) {
		return $this->getCommandBuilder()->createInsertInto(
			$this->getCommandBuilder()->createIdentifier($table),
			$this,
			$this->getCommandBuilder()->createIdentifiers($columns)
		);
	}

	public function insertIgnoreInto($table, $columns) {
		return $this->getCommandBuilder()->createInsertIgnoreInto(
			$this->getCommandBuilder()->createIdentifier($table),
			$this,
			$this->getCommandBuilder()->createIdentifiers($columns)
		);
	}

	public function select($subject) {
		return $this->getCommandBuilder()->createSelect(
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
		return $this->getCommandBuilder()->createStartTransaction($this);
	}
}
