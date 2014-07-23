<?php
namespace Pribi\Commands\Statements\Inserts;

use Pribi\Builders\CommandsBuilder;
use Pribi\Commands\Command;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\WithIdentifier;
use Pribi\Commands\Statements\Selects\Select;
use Pribi\Commands\Identifiers\Identifiers;

abstract class Insert extends WithIdentifier {
	private $columns;

	public function __construct(
		Identifier $tableIdentifier,
		Command $previousCommand,
		CommandsBuilder $commandsBuilder,
		Identifiers $columns = NULL
	) {
		parent::__construct($tableIdentifier, $previousCommand, $commandsBuilder);
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
