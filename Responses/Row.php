<?php
namespace Pribi\Responses;

use Pribi\Core\Object;
use Pribi\Responses\Exceptions\RequestedResultColumnMissing;

class Row extends Object implements \ArrayAccess {
	private $values;

	public function __construct(array $values) {
		$this->values = $values;
	}

	public function keyExists($key) {
		return array_key_exists($key, $this->values);
	}

	public function offsetExists($offset) {
		return isset($this->values[$offset]);
	}

	public function offsetGet($offset) {
		if (array_key_exists($offset, $this->values)) {
			return $this->values[$offset];
		} else {
			throw new Exceptions\RequestedResultColumnMissing($offset);
		}
	}

	public function offsetSet($offset, $value) {
		throw new Exceptions\ResponseCanNotBeChanged();
	}

	public function offsetUnset($offset) {
		throw new Exceptions\ResponseCanNotBeChanged();
	}
}
