<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Commands\QueryPart;

class Identifiers extends QueryPart implements \IteratorAggregate, \Countable {

	private $identifiers;

	public function __construct(array $subjects, \Pribi\Builders\CommandsBuilder $commandsBuilder) {
		$this->buildIdentifiers($subjects, $commandsBuilder);
	}

	private function buildIdentifiers(array $subjects, \Pribi\Builders\CommandsBuilder $commandsBuilder) {
		$this->identifiers = new \ArrayIterator();
		foreach ($subjects as $subject) {
			$this->identifiers->append($commandsBuilder->createIdentifier($subject));
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
	 * @return \ArrayIterator Identifier[]
	 */
	public function getIterator() {
		return $this->identifiers;
	}

	public function count() {
		return count($this->identifiers);
	}
}
