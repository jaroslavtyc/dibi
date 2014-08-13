<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class HighPriority extends \Pribi\Commands\WithoutIdentifier {

	protected function toSql() {
		return 'HIGH PRIORITY';
	}

	public function ignore() {
		return $this->getCommandBuilder()->createIgnore($this);
	}

	public function into($tableName, array $columnNames = [], array $partitionNames = []) {
		return $this->getCommandBuilder()->createInto(
			$this->getCommandBuilder()->createIdentifier($tableName),
			$this->getCommandBuilder()->createIdentifiers($columnNames),
			$this->getCommandBuilder()->createIdentifiers($partitionNames),
			$this
		);
	}
}
