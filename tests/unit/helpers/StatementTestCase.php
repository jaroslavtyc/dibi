<?php
namespace tests\unit\helpers;

abstract class StatementTestCase extends CommandTestCase {

	protected $testedClassName;
	protected $namespacePrefix;

	protected function setUp() {
		parent::setUp();
		$this->testedClassName = $this->getTestedClassName();
		$this->namespacePrefix = $this->getNamespacePrefix();
	}

	private function getTestedClassName() {
		return preg_replace('~Test$~', '', static::class);
	}

	private function getNamespacePrefix() {
		preg_match('~\\\(?<prefix>\w+)QueryStatements\\\~', static::class, $matches);
		return $matches['prefix'];
	}

	public function testNoFollowingStatementIsMissingOrExcessive() {
		$hunter = new \tests\unit\helpers\HunterOfMissingTestsAndStatements(
			new AvailableTestsFinder,
			new AvailableStatementsFinder()
		);
		$hunter->hunt($this->testedClassName);
	}
}
