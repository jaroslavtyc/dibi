<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\Command;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\WithIdentifier;
use Pribi\Commands\Selects\Select;
use Pribi\Commands\Identifiers\Identifiers;

abstract class Insert extends WithIdentifier {
	private $columns;

	public function __construct(Identifier $tableName, Command $previousCommand, Identifiers $columns = NULL) {
		parent::__construct($tableName, $previousCommand);
		$this->columns = $columns;
	}

	protected function toSql() {
		$sql = 'INTO ' . $this->getIdentifier()->toSql();
		if (count($this->columns) > 0) {
			$sql .= '(' . $this->getImplodedColumns() . ')';
		}

		return $sql;
	}

	private function getImplodedColumns() {
		$imploded = '';
		$delimiter = '';
		foreach ($this->columns as $column) {
			/**
			 * @var Identifier $column
			 */
			$imploded .= $delimiter . $column->toSql();
			$delimiter = ',';
		}

		return $imploded;
	}

	public function values($subjects) {
		return new Values(new Identifiers($subjects), $this);
	}

	public function select($subject) {
		return new Select($subject, $this);
	}
}
