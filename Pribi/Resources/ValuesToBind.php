<?php
namespace Pribi\Resources;

class ValuesToBind extends \Pribi\Core\Object implements \Iterator {
	private $values = array();

	public function addValue($scalarValue, $name = FALSE, $dataType = ValueToBind::DEFAULT_DATA_TYPE) {
		$valueToBind = new ValueToBind($scalarValue, $this->resolveValueName($name), $dataType);
		if (!isset($this->values[$valueToBind->getName()])) {
			$this->values[$valueToBind->getName()] = $valueToBind;
		} else {
			throw new Exceptions\AlreadySet(sprintf('Value to bind of name [%s]', $valueToBind->getName()));
		}
	}

	private function resolveValueName($name) {
		if ($name === FALSE) {
			$name = count($this->values);
		} elseif (!is_null($name)) {
			$name = (string) $name;
		} else {
			throw new Exceptions\CannotBeSet('Name of value can not be null');
		}

		return $name;
	}

	/**
	 * @return ValueToBind|FALSE
	 */
	public function current() {
		return current($this->values);
	}

	/**
	 * @return ValueToBind|FALSE
	 */
	public function next() {
		return next($this->values);
	}

	/**
	 * @return string|int|NULL
	 */
	public function key() {
		return key($this->values);
	}

	public function valid() {
		return !is_null($this->key());
	}

	/**
	 * @return ValueToBind|FALSE
	 */
	public function rewind() {
		return reset($this->values);
	}
}
