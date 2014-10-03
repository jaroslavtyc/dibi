<?php
namespace tests\unit\helpers;

abstract class StatementsFinder {

	protected function checkIfClassExists($className) {
		if (!class_exists($className)) {
			throw new \BadMethodCallException(
				sprintf('Class of name %s has not been found.', var_export($className, TRUE /* do not print, just return string */))
			);
		}
	}

	protected function getClassFileContent($className) {
		return file_get_contents($this->getClassFileName($className));
	}

	private function getClassFileName($className) {
		$reflectionClass = new \ReflectionClass($className);
		return $reflectionClass->getFileName();
	}
}
 