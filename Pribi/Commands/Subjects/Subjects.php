<?php
namespace Pribi\Commands\Subjects;

class Subjects extends \Pribi\Commands\QueryPart implements \IteratorAggregate, \Countable {

	private $subjectValues;

	public function __construct(array $subjectValues, \Pribi\Builders\CommandsBuilder $commandsBuilder) {
		$this->buildIdentifiers($subjectValues, $commandsBuilder);
	}

	private function buildIdentifiers(array $subjectValues, \Pribi\Builders\CommandsBuilder $commandsBuilder) {
		$this->subjectValues = new \ArrayIterator();
		foreach ($subjectValues as $value) {
			$this->subjectValues->append($commandsBuilder->createSubject($value));
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
