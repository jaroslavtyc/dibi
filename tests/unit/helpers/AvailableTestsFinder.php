<?php
namespace tests\unit\helpers;

class AvailableTestsFinder extends StatementsFinder {

	public function findExpectedStatements($statementClassName) {
		$this->checkIfClassExists($statementClassName);
		$testClassName = $this->getTestClassTo($statementClassName);
		$this->checkIfClassExists($testClassName);
		$assertContents = $this->getAssertContents($testClassName);
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
	 * @param $testClassName
	 * @return array
	 */
	private function getAssertContents($testClassName) {
		$reflectionClass = new \ReflectionClass($testClassName);
		$publicDynamicMethods = $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC ^ \ReflectionMethod::IS_STATIC);
		$methodsByFile = [];
		foreach ($publicDynamicMethods as $publicDynamicMethod) {
			if (preg_match('~^Pribi[\W]|tests[\W]~', $publicDynamicMethod->getFileName())) {
				if (!isset($methodsByFile[$publicDynamicMethod->getFileName()])) {
					$methodsByFile[$publicDynamicMethod->getFileName()] = [];
				}
				$methodsByFile[$publicDynamicMethod->getFileName()][] = $publicDynamicMethod;
			}
		}

		$assertContents = [];
		foreach ($methodsByFile as $file => $methodsFromSameFile) {
			$fileRows = explode("\n", file_get_contents($file));
			foreach ($methodsFromSameFile as $methodReflection) {
				$methodContent = '';
				/** @var \ReflectionMethod $methodReflection */
				for ($currentRow = $methodReflection->getStartLine(); $currentRow < $methodReflection->getEndLine() - 1; $currentRow++) {
					$methodContent .= $fileRows[$currentRow];
				}
				if ($methodContent !== '') {
					preg_match(
						'~[>|\s]assert[A-Z]\w+\s*\((?<assertContent>.+)\)~',
						$methodContent,
						$matches
					);
					if (isset($matches['assertContent']) && $matches['assertContent'] !== '') {
						$assertContents[] = $matches['assertContent'];
					}
				}
			}
		}

		return $assertContents;
	}

	private function getTestedStatement($string) {
		preg_match('~\$\w+->(?<statementMethod>\w+)\(~', $string, $statementMethodWithDebris);
		if (isset($statementMethodWithDebris['statementMethod'])) {
			return $statementMethodWithDebris['statementMethod'];
		} else {
			return FALSE;
		}
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

}
