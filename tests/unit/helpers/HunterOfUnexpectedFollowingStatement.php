<?php
namespace tests\unit\helpers;

class HunterOfUnexpectedFollowingStatement {

	private $expectedStatementsFinder;
	private $excessiveStatementsFinder;

	public function __construct(ExpectedStatementsFinder $expectedStatementsFinder, ExcessiveStatementsFinder $excessiveStatementsFinder) {
		$this->expectedStatementsFinder = $expectedStatementsFinder;
		$this->excessiveStatementsFinder = $excessiveStatementsFinder;
	}

	public function hunt($statementClassName) {
		$expectedStatements = $this->expectedStatementsFinder->findExpectedStatements($statementClassName);
		$availableStatements = $this->excessiveStatementsFinder->findAvailableStatements($statementClassName);
		$unexpectedStatements = $this->getExcessiveStatements($expectedStatements, $availableStatements);
		$missingStatements = $this->getMissingStatements($expectedStatements, $availableStatements);
		if ($unexpectedStatements) {
			$this->complainAboutExcessiveStatements($unexpectedStatements, $statementClassName);
		}
		if ($missingStatements) {
			$this->complainAboutMissingStatements($missingStatements, $statementClassName);
		}
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
			'%d tests missing for following statements in the class %s. Their list follows: %s',
			count($unexpectedStatements),
			$statementClassName,
			implode(', ', $unexpectedStatements)
		));
	}

	private function complainAboutMissingStatements(array $missingStatements, $statementClassName) {
		throw new \LogicException(sprintf(
			'%d following statements missing in the class %s. Their list follows: %s',
			count($missingStatements),
			$statementClassName,
			implode(', ', $missingStatements)
		));
	}
}
