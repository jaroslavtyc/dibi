<?php
namespace Pribi\Resources;

use Pribi\Core\Object;
use Pribi\Responses\Result;

class Prepared extends Object {
	private $statement;

	public function __construct(\PDOStatement $statement) {
		$this->statement = $statement;
	}

	public function bindValues(ValuesToBind $values) {
		foreach ($values as $value) {
			$this->statement->bindValue($value->getName(), $value->getValue(), $value->getType());
		}
	}

	public function execute() {
		return new Result($this->statement);
	}
}
