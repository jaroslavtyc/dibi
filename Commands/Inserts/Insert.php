<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\Command;
use Pribi\Commands\Exceptions\WrongFormat;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\WithIdentifier;
use Pribi\Commands\Selects\Select;

abstract class Insert extends WithIdentifier {
	private $columns;

	public function __construct(Identifier $table, $columns, Command $previousCommand) {
		parent::__construct($table, $previousCommand);
		$this->columns = $this->extractColumns($columns);
	}

	private function extractColumns($columns) {
		if (is_array($columns)) {
			$extracted = $columns;
		} elseif (is_object($columns)) {
			$extracted = $this->extractColumnsFromObject($columns);
		} elseif (is_scalar($columns)) {
			$extracted = $this->splitFromString((string)$columns);
		} else {
			throw new WrongFormat(sprintf('Do not know how to extract columns from [%s]', var_export($columns, TRUE)));
		}

		if (count($extracted) === 0) {
			throw new WrongFormat(sprintf('Cannot extract any column name from given [%s]', var_export($columns, TRUE)));
		}

		return $extracted;
	}

	private function extractColumnsFromObject($columns) {
		if (is_a($columns, '\Traversable')) {
			$extracted = array();
			foreach ($columns as $column) {
				$extracted[] = $column;
			}
		} elseif (method_exists($columns, '__toString')) {
			$extracted = $this->splitFromString((string)$columns);
		} else {
			throw new WrongFormat(sprintf('Cannot find out how to extract columns from given class [%s].', get_class($columns)));
		}

		return $extracted;
	}

	private function splitFromString($string) {
		return array_map(function ($name) {
				return trim($name);
			},
			explode(',', $string)
		);
	}

	public function partition($identificator) {
		return new Partition($identificator, $this);
	}

	public function values($identificator) {
		return new Values($identificator, $this);
	}

	public function select($subject) {
		return new Select($subject, $this);
	}

	/**
	 * @return string[] array
	 */
	protected function getColumns() {
		return $this->columns;
	}

	protected function getSqlWithoutInsertCommand() {
		$query = ' INTO ' . $this->getTable();
		if (count($this->getColumns()) > 0) {
			$columns = array();
			foreach ($this->getColumns() as $column) {
				$columns[] = $this->identifierQuoter()->quote($column);
			}
			$query .= '(' . implode($columns) . ')';
		}

		return $query;
	}

	protected function getTable() {
		return $this->getIdentifier();
	}
}
