<?php
namespace tests\unit\helpers;

class HunterOfUnexpectedFollowingStatement {

	private $expectedStatementsFinder;
	private $availableStatementsFinder;

	public function __construct(ExpectedStatementsFinder $expectedStatementsFinder, AvailableStatementsFinder $availableStatementsFinder) {
		$this->expectedStatementsFinder = $expectedStatementsFinder;
		$this->availableStatementsFinder = $availableStatementsFinder;
	}

	public function hunt($statementClassName) {
		$expectedStatements = $this->expectedStatementsFinder->findExpectedStatements($statementClassName);
		$availableStatements = $this->availableStatementsFinder->findAvailableStatements($statementClassName);
		$unexpectedStatements = $this->getUnexpectedStatements($expectedStatements, $availableStatements);
		$missingStatements = $this->getMissingStatements($expectedStatements, $availableStatements);
		if ($unexpectedStatements) {
			$this->complainAboutUnexpectedStatements($unexpectedStatements, $statementClassName);
		}
		if ($missingStatements) {
			$this->complainAboutMissingStatements($missingStatements, $statementClassName);
		}
	}

	private function getUnexpectedStatements(array $expectedStatements, array $availableStatements) {
		$sameStatements = array_intersect($expectedStatements, $availableStatements);
		return array_diff($availableStatements, $sameStatements);
	}

	private function getMissingStatements(array $expectedStatements, array $availableStatements) {
		$sameStatements = array_intersect($expectedStatements, $availableStatements);
		return array_diff($expectedStatements, $sameStatements);
	}

	private function complainAboutUnexpectedStatements(array $unexpectedStatements, $statementClassName) {
		throw new \LogicException(sprintf(
			'%d tests are missing for following statements in the class %s. Their list follows: %s',
			count($unexpectedStatements),
			$statementClassName,
			implode(', ', $unexpectedStatements)
		));
	}

	private function complainAboutMissingStatements(array $missingStatements, $statementClassName) {
		throw new \LogicException(sprintf(
			'%d following statements are missing in the class %s. Their list follows: %s',
			count($missingStatements),
			$statementClassName,
			implode(', ', $missingStatements)
		));
	}
}
