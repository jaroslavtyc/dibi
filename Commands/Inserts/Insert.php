<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\Exceptions\WrongFormat;
use Pribi\Commands\WithoutIdentificator;
use Pribi\Commands\Selects\Select;

abstract class Insert extends WithoutIdentificator {
	public function __construct(Command $previousCommand, $columns) {
		$this->previousCommand = $previousCommand;
		$this->columns = $this->extractColumns($columns);
	}

	private function extractColumns($columns) {
		$extracted = array();
		if (is_array($columns)) {
			$extracted = $columns;
		} elseif (is_object($columns)) {
			if (is_a($columns, '\Traversable')) {
				foreach ($columns as $column) {
					$extracted[] = $column;
				}
			} elseif (method_exists($columns, '__toString')) {
				$extracted = $this->splitFromString((string)$columns);
			} else {
				throw new WrongFormat(sprintf('Cannot find out how to extract columns from given class [%s].', get_class($columns)));
			}
		} elseif (is_scalar($columns)) {
			$extracted = $this->splitFromString((string)$columns);
		}

		if (empty($extracted)) {
			throw new WrongFormat(sprintf('Cannot extract any column name from given [%s]', var_export($columns, TRUE)));
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
		return new Select($subject);
	}
}
