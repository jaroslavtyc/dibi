<?php
namespace Pribi\Resources;

use Pribi\Core\Object,
	Pribi\Responses\Result;

class Prepared extends Object {
	/**
	 * @var \mysqli_stmt
	 */
	private $statement;
	private $legacyErrorLevelReporting;

	public function __construct(\mysqli_stmt $statement) {
		$this->statement = $statement;
	}

	public function bindValues(ValuesToBind $values) {
		$types = '';
		$arguments = array();
		/**
		 * @var ValueToBind[] $values
		 */
		foreach ($values as $value) {
			$types .= $this->getMysqliType($value->getPdoDataType());
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
		$this->suppressWarningReport();
		$result = $method->invokeArgs($this->statement, $parameters);
		$this->restoreWarningReport();
		if (!$result) {
			$this->reportBindingFailure();
		}
	}

	private function prepareParameters($types, array $arguments) {
		$referenced = array();
		foreach ($arguments as $key => $argument) {
			$referenced[$key] = &$argument;
		}
		array_unshift($referenced, $types);

		return $referenced;
	}

	private function suppressWarningReport() {
		if (error_reporting() & E_WARNING) {
			$this->legacyErrorLevelReporting = error_reporting();
			error_reporting($this->legacyErrorLevelReporting ^ E_WARNING);
		}
	}

	private function reportBindingFailure() {
		$error = error_get_last();
		if (!is_null($error)) {
			throw new Exceptions\BindingParametersFailed($error['message']);
		}
	}

	private function restoreWarningReport() {
		if (isset($this->legacyErrorLevelReporting)) {
			error_reporting($this->legacyErrorLevelReporting);
		}
	}

	public function execute() {
		$this->statement->execute();

		return new Result($this->statement);
	}
}
