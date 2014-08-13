<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class Ignore extends \Pribi\Commands\WithoutIdentifier {

	protected function toSql() {
		return 'IGNORE';
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
