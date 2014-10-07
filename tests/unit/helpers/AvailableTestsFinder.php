<?php
namespace tests\unit\helpers;

class AvailableTestsFinder extends StatementsFinder {

	public function findExpectedStatements($statementClassName) {
		$this->checkIfClassExists($statementClassName);
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