<?php
namespace Pribi\Resources;

use Pribi\Core\Object;
use Pribi\Responses\Result;

class Prepared extends Object {
	/**
	 * @var \mysqli_stmt
	 */
	private $statement;
	private $legacyErrorLevelReporting;
	private $lastError;

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
		$this->prepareToCheckBindingFailure();
		$method->invokeArgs($this->statement, $parameters);
		$this->checkBindingFailure();
	}

	private function prepareParameters($types, array $arguments) {
		$referenced = array();
		foreach ($arguments as $key => $argument) {
			$referenced[$key] = &$argument;
		}
		array_unshift($referenced, $types);

		return $referenced;
	}

	private function prepareToCheckBindingFailure() {
		$this->lastError = error_get_last();
		$this->suppressWarningReport();
	}

	private function suppressWarningReport() {
		if (error_reporting() & E_WARNING) {
			$this->legacyErrorLevelReporting = error_reporting();
			error_reporting($this->legacyErrorLevelReporting ^ E_WARNING);
		}
	}

	private function checkBindingFailure() {
		$this->restoreWarningReport();
		$error = error_get_last();
		if (!is_null($error) && (is_null($this->lastError) || $error !== $this->lastError)) {
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
