<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class Ignore extends \Pribi\Commands\WithoutIdentifier {

	protected function toSql() {
		return 'IGNORE';
	}

	public function into($tableName, array $columnNames = []) {
		return $this->getCommandBuilder()->createInto(
			$this->getCommandBuilder()->createIdentifier($tableName),
			$this->getCommandBuilder()->createIdentifiers($columnNames),
			$this
		);
	}
}
 