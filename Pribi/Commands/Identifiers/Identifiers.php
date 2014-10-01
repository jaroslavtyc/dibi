<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Commands\QueryPart;

class Identifiers extends QueryPart implements \IteratorAggregate, \Countable {

	private $identifiers;

	public function __construct(array $subjects, \Pribi\Builders\Commands\Builder $commandBuilder) {
		$this->buildIdentifiers($subjects, $commandBuilder);
	}

	private function buildIdentifiers(array $subjects, \Pribi\Builders\Commands\Builder $commandBuilder) {
		$this->identifiers = new \ArrayIterator();
		foreach ($subjects as $subject) {
			$this->identifiers->append($commandBuilder->createIdentifier($subject));
		}
	}

	protected function toSql() {
		$sql = '';
		$delimiter = '';
		foreach ($this->identifiers as $identifier) {
			/** @var Identifier $identifier */
			$sql .= $delimiter . $identifier->toSql();
			$delimiter = ',';
		}

		return $sql;
	}

	/**
	 * @return Identifier[]
	 */
	public function getIterator() {
		return $this->identifiers;
	}

	public function count() {
		return count($this->identifiers);
	}
}
