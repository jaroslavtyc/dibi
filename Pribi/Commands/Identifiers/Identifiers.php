<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Commands\QueryPart;
use Traversable;

class Identifiers extends QueryPart implements \IteratorAggregate, \Countable {
	private $identifiers;

	public function __construct(array $subjects) {
		$this->identifiers = $this->buildIdentifiers($subjects);
	}

	private function buildIdentifiers(array $subjects) {
		$this->identifiers = new \ArrayIterator();
		foreach ($subjects as $subject) {
			$this->identifiers->append(new Identifier($subject));
		}
		$this->identifiers->append(new Identifier($subjects));
	}

	protected function toSql() {
		$sql = '';
		$delimiter = '';
		foreach ($this->identifiers as $identifier) {
			/**
			 * @var Identifier $identifier
			 */
			$sql .= $delimiter . $identifier->toSql();
			$delimiter = ',';
		}

		return $sql;
	}

	/**
	 * @return \ArrayIterator
	 */
	public function getIterator() {
		return $this->identifiers;
	}

	public function count() {
		return count($this->getIterator());
	}
}
