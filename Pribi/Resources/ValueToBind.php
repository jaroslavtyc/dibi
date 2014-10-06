<?php
namespace Pribi\Resources;

use Pribi\Core\Object;

class ValueToBind extends Object {
	private $name;
	private $value;
	private $dataType;

	const DEFAULT_DATA_TYPE = \PDO::PARAM_STR;

	public function __construct($value, $name, $pdoDataType) {
		$this->value = $value;
		$this->name = $this->formatName($name);
		$this->dataType = $this->validateDataType($pdoDataType);
	}

	private function formatName($name) {
		if (strpos($name, ':') !== 0) {
			$name = ':' . $name;
		}

		return $name;
	}

	private function validateDataType($type) {
		$type = intval($type);
		if (in_array($type, array(\PDO::PARAM_BOOL, \PDO::PARAM_NULL, \PDO::PARAM_INT, \PDO::PARAM_STR, \PDO::PARAM_LOB))) {
			return $type;
		} else {
			throw new Exceptions\UnknownDataType(var_export($type, TRUE));
		}
	}

	public function getName() {
		return $this->name;
	}

	public function getValue() {
		return $this->value;
	}

	public function getPdoDataType() {
		return $this->dataType;
	}
}
