<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Core\Object;
use Traversable;

class Identifiers extends Object implements \IteratorAggregate {
	public function __construct($subjects) {
		$this->identifiers = $this->buildIdentifiers($subjects);
	}

	private function buildIdentifiers($subjects) {
		$this->identifiers = new \ArrayIterator();
		if (is_array($subjects) || (is_object($subjects) && is_a($subjects, 'Traversable'))) {
			foreach ($subjects as $subject) {
				$this->identifiers->append(new Identifier($subject));
			}
		} else {
			$this->identifiers->append(new Identifier($subjects));
		}
	}

	/**
	 * @return \ArrayIterator
	 */
	public function getIterator() {
		return $this->identifiers;
	}
}
