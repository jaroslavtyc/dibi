<?php
namespace tests\unit\helpers;

class ExcessiveStatementsFinder extends StatementsFinder {

	public function findAvailableStatements($statementClassName) {
		$publicMethodNames = $this->getPublicMethodNames($statementClassName);
		$publicMethodNamesRepresentingStatements = $this->filterOutMagicMethods($publicMethodNames);

		return $publicMethodNamesRepresentingStatements;
	}

	/**
	 * @param $className
	 * @return \ReflectionMethod[]
	 */
	private function getPublicMethodNames($className) {
		$phpDocumentedPublicMethods = $this->parsePhpDocumentedPublicMethods($this->getClassFileContent($className));
		$codedPublicMethodNames = $this->getCodedPublicMethodNames($className);
		return array_merge($codedPublicMethodNames, $phpDocumentedPublicMethods);
	}

	/**
	 * @param $stringToParse
	 * @return array
	 */
	private function parsePhpDocumentedPublicMethods($stringToParse) {
		preg_match_all('~\*\s*@method\s+(?:\w+\s+)?(?<methodNames>\w+)\s*\(~', $stringToParse, $matches);
		if (isset($matches['methodNames'])) {
			return $matches['methodNames'];
		} else {
			return [];
		}
	}

	private function getCodedPublicMethodNames($className) {
		$reflectedClassName = new \ReflectionClass($className);
		$codedPublicMethods = $reflectedClassName->getMethods(\ReflectionMethod::IS_PUBLIC ^ /* bitwise Xor */
			\ReflectionMethod::IS_STATIC);
		return $this->extractMethodNames($codedPublicMethods);
	}

	private function extractMethodNames(array $reflectionsOfMethods) {
		$methodNames = [];
		foreach ($reflectionsOfMethods as $reflectionOfMethod) {
			/** @var \ReflectionMethod $reflectionOfMethod */
			$reflectionOfMethod->getName();
			$methodNames[] = $reflectionOfMethod->getName();
		}

		return $methodNames;
	}

	private function filterOutMagicMethods(array $methodNames) {
		return array_filter($methodNames, function ($methodName) {
			return !preg_match('~^__~' /* prefix of magic methods */, $methodName);
		});
	}
}