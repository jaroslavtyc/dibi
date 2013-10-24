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
			$types .= $this->getMysqliType($value->getType());
			$arguments[] = $value->getValue();
		}
		$reflection = new \ReflectionClass('mysqli_stmt');
		$method = $reflection->getMethod('bind_param');
		$method->invokeArgs($this->statement, $arguments);
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

	public function execute() {
		$this->statement->execute();

		return new Result($this->statement);
	}
}
