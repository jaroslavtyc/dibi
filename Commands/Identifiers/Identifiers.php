<?php
namespace Pribi\Commands\Identifiers;

use Pribi\Core\Object;
use Traversable;

class Identifiers extends Object implements \IteratorAggregate {
	public function __construct($subjects) {
		$this->identifiers = $this->buildIdentifiers($subjects);
	}

	private function buildIdentifiers($subjects) {
		$this->identifiers = array();
		if (is_array($subjects) || (is_object($subjects) && is_a($subjects, 'Traversable'))) {
			foreach ($subjects as $subject) {
				$this->identifiers[] = new Identifier($subject);
			}
		} else {
			$this->identifiers[] = new Identifier($subjects);
		}
	}

	/**
	 * @return Identifier[] array
	 */
	public function getIterator() {
		return $this->identifiers;
	}
}
