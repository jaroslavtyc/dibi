<?php
namespace Pribi\Resources;

use Pribi\Core\Object;

class ValuesToBind extends Object implements \Iterator {
	private $values = array();

	public function addValue($scalarValue, $name = FALSE, $dataType = ValueToBind::DEFAULT_DATA_TYPE) {
		$valueToBind = new ValueToBind($scalarValue, $this->resolveValueName($name), $dataType);
		if (!isset($this->values[$valueToBind->getName()])) {
			$this->values[$valueToBind->getName()] = $valueToBind;
		} else {
			throw new AlreadySet(sprintf('Value to bind of name [%s]', $valueToBind->getName()));
		}
	}

	private function resolveValueName($name) {
		if ($name === FALSE) {
			$name = (string) count($this->values);
		} elseif (is_null($name)) {
			throw new Exceptions\NameOfValueToBindCanNotBeNull;
		}

		return $name;
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
		return !is_null($this->key());
	}

	public function rewind() {
		return reset($this->values);
	}
}
