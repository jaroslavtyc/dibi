<?php
namespace Pribi\Resources;

use Pribi\Core\Object;

class ValuesToBind extends Object implements \Iterator {
	private $values = array();

	public function addValue($name, $value, $dataType = ValueToBind::DEFAULT_DATA_TYPE) {
		$valueToBind = new ValueToBind($name, $value, $dataType);
		if (!isset($this->values[$valueToBind->getName()])) {
			$this->values[$valueToBind->getName()] = $value;
		} else {
			throw new AlreadySet(sprintf('Value to bind of name [%s]', $valueToBind->getName()));
		}
	}

	/**
	 * @return ValueToBind
	 */
	public function current() {
		return current($this->values);
	}

	/**
	 * @return ValueToBind
	 */
	public function next() {
		return next($this->values);
	}

	public function key() {
		return key($this->values);
	}

	public function valid() {
		return $this->key() !== FALSE;
	}

	public function rewind() {
		reset($this->values);
	}
}
