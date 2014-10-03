<?php
namespace tests\unit\helpers;

class HunterOfUnexpectedFollowingStatement {

	public function hunt($statementClassName) {
		$this->checkIfClassExists($statementClassName);
		$expectedStatements = $this->findExpectedStatements($statementClassName);
		$availableStatements = $this->findAvailableStatements($statementClassName);
		$unexpectedStatements = $this->getExcessiveStatements($expectedStatements, $availableStatements);
		$missingStatements = $this->getMissingStatements($expectedStatements, $availableStatements);
		if ($unexpectedStatements) {
			$this->complainAboutExcessiveStatements($unexpectedStatements, $statementClassName);
		}
		if ($missingStatements) {
			$this->complainAboutMissingStatements($missingStatements, $statementClassName);
		}
	}

	private function checkIfClassExists($className) {
		if (!class_exists($className)) {
			throw new \BadMethodCallException(
				sprintf('Class of name %s has not been found.', var_export($className, TRUE /* do not print, just return string */))
			);
		}
	}

	private function findExpectedStatements($statementClassName) {
		$assertContents = $this->getAssertContents($statementClassName);
		$expectedStatements = [];
		if ($assertContents) {
			foreach ($assertContents as $assertContent) {
				$testedStatement = $this->getTestedStatement($assertContent);
				if ($testedStatement) {
					$expectedStatements[] = $testedStatement;
				}
			}
		}

		return $this->filterOurMagicMethods($expectedStatements);
	}

	/**
	 * @param $className
	 * @return array
	 */
	private function getAssertContents($className) {
		preg_match_all(
			'~[>|\s]assert[A-Z]\w+\s*\((?<assertContent>.+)\)~',
			$this->getClassFileContent($this->getTestClassTo($className)),
			$matches
		);

		if (count($matches['assertContent'])) {
			return $matches['assertContent'];
		} else {
			return [];
		}
	}

	private function getTestedStatement($string) {
		preg_match('~\$\w+->(?<statementMethod>\w+)\(~', $string, $statementMethodWithDebris);
		if (isset($statementMethodWithDebris['statementMethod'])) {
			return $statementMethodWithDebris['statementMethod'];
		} else {
			return FALSE;
		}
	}

	private function getClassFileContent($className) {
		return file_get_contents($this->getClassFileName($className));
	}

	private function getClassFileName($className) {
		$reflectionClass = new \ReflectionClass($className);
		return $reflectionClass->getFileName();
	}

	private function getTestClassTo($className) {
		return preg_replace('~\w+$~', '\0Test', $className);
	}

	private function filterOurMagicMethods(array $methodNames) {
		return array_filter($methodNames, function ($methodName) {
			return $methodName !== 'invoke' /* toSql protected method calling */
				;
		});
	}

	private function findAvailableStatements($statementClassName) {
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

	private function getCodedPublicMethodNames($className) {
		$reflectedClassName = new \ReflectionClass($className);
		$codedPublicMethods = $reflectedClassName->getMethods(\ReflectionMethod::IS_PUBLIC ^ /* bitwise Xor */
			\ReflectionMethod::IS_STATIC);
		return $this->extractMethodNames($codedPublicMethods);
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

	private function getExcessiveStatements(array $expectedStatements, array $availableStatements) {
		$sameStatements = array_intersect($expectedStatements, $availableStatements);
		return array_diff($availableStatements, $sameStatements);
	}

	private function getMissingStatements(array $expectedStatements, array $availableStatements) {
		$sameStatements = array_intersect($expectedStatements, $availableStatements);
		return array_diff($expectedStatements, $sameStatements);
	}

	private function complainAboutExcessiveStatements(array $unexpectedStatements, $statementClassName) {
		throw new \LogicException(sprintf(
			'Found %d excessive following statements in class %s. Their list follows: %s',
			count($unexpectedStatements),
			$statementClassName,
			implode(',', $unexpectedStatements)
		));
	}

	private function complainAboutMissingStatements(array $missingStatements, $statementClassName) {
		throw new \LogicException(sprintf(
			'Missing %d following statements in class %s. Their list follows: %s',
			count($missingStatements),
			$statementClassName,
			implode(',', $missingStatements)
		));
	}

}
 