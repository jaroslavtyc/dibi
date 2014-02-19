<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Commands\QueryPart;

class Subjects extends QueryPart implements \IteratorAggregate, \Countable {
	private $subjects;

	public function __construct($subjects) {
		$this->subjects = $this->buildSubjects($subjects);
	}

	private function buildSubjects($subjects) {
		$this->subjects = new \ArrayIterator();
		if (is_array($subjects) || (is_object($subjects) && is_a($subjects, 'Traversable'))) {
			foreach ($subjects as $subject) {
				$this->subjects->append(new Subject($subject));
			}
		} else {
			$this->subjects->append(new Subject($subjects));
		}
	}

	protected function toSql() {
		$sql = '';
		$delimiter = '';
		foreach ($this->subjects as $subject) {
			/**
			 * @var Subject $subject
			 */
			$sql .= $delimiter . $subject->toSql();
			$delimiter = ',';
		}

		return $sql;
	}

	/**
	 * @return \ArrayIterator
	 */
	public function getIterator() {
		return $this->subjects;
	}

	public function count() {
		return count($this->getIterator());
	}
}
