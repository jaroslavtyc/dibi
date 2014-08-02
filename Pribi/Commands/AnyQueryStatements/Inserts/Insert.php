<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

/**
 * Class Insert
 * @package Pribi\Commands\AnyQueryStatements\Inserts
 *
 * @see http://dev.mysql.com/doc/refman/5.6/en/insert.html
 */
class Insert extends \Pribi\Commands\WithoutIdentifier {

	protected function toSql() {
		return 'INSERT';
	}

	public function lowPriority() {
		return $this->getCommandBuilder()->createLowPriority($this);
	}

	public function highPriority() {
		return $this->getCommandBuilder()->createHighPriority($this);
	}

	public function delayed() {
		return $this->getCommandBuilder()->createDelayed($this);
	}

	public function into($tableName, $columnNames = []) {
		return $this->getCommandBuilder()->createInto(
			$this->getCommandBuilder()->createIdentifier($tableName),
			$this->getCommandBuilder()->createIdentifiers($columnNames),
			$this
		);
	}

	public function ignoreInto($tableName, array $columnNames = []) {
		return $this->getCommandBuilder()->createIgnore($this)
			->into($tableName, $columnNames);
	}
}
