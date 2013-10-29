<?php
namespace Pribi\Resources;

use Pribi\Core\Object;
use Pribi\Responses\Result;

class Prepared extends Object {
	/**
	 * @var \mysqli_stmt
	 */
	private $statement;

	public function __construct(\mysqli_stmt $statement) {
		$this->statement = $statement;
	}

	public function bindValues(ValuesToBind $values) {
		$types = '';
		$arguments = array();
		foreach ($values as $value) {
			$types .= $this->getMysqliType($value->getDataType());
			$arguments[$value->getName()] = $value->getValue();
		}
		$this->bindParameters($types, $arguments);
	}

	private function getMysqliType($pdoType) {
		switch ($pdoType) {
			case \PDO::PARAM_INT :
				return 'i';
			case \PDO::PARAM_LOB :
				return 'b';
			default :
				return 's';
		}
	}

	private function bindParameters($types, array $arguments) {
		$parameters = $this->prepareParameters($types, $arguments);
		$reflection = new \ReflectionClass('mysqli_stmt');
		$method = $reflection->getMethod('bind_param');
		$method->invokeArgs($this->statement, $parameters);
	}

	private function prepareParameters($types, array $arguments) {
		$referenced = array();
		foreach ($arguments as $key => $argument) {
			$referenced[$key] = &$argument;
		}
		array_unshift($referenced, $types);

		return $referenced;
	}

	public function execute() {
		$this->statement->execute();

		return new Result($this->statement);
	}
}
