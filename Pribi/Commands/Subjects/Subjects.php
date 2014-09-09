<?php
namespace Pribi\Commands\Subjects;

class Subjects extends \Pribi\Commands\QueryPart implements \IteratorAggregate, \Countable {

	private $subjectValues;

	public function __construct(array $subjectValues, \Pribi\Builders\Commands\Builder $commandBuilder) {
		$this->buildIdentifiers($subjectValues, $commandBuilder);
	}

	private function buildIdentifiers(array $subjectValues, \Pribi\Builders\Commands\Builder $commandBuilder) {
		$this->subjectValues = new \ArrayIterator();
		foreach ($subjectValues as $value) {
			$this->subjectValues->append($commandBuilder->createSubject($value));
		}
	}

	protected function toSql() {
		$sql = '';
		$delimiter = '';
		foreach ($this->subjectValues as $subjectValue) {
			/** @var Subject $subjectValue */
			$sql .= $delimiter . $subjectValue->toSql();
			$delimiter = ',';
		}

		return $sql;
	}

	/**
	 * @return Identifier[]
	 */
	public function getIterator() {
		return $this->subjectValues;
	}

	public function count() {
		return count($this->subjectValues);
	}
}
