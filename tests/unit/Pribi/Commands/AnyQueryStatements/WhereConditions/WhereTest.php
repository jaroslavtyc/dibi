<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions;

class WhereTest extends \Tests\Unit\Helpers\CommandTestCase {

	/**
	 * @var \UnitTester
	 */
	protected $tester;

	protected function _before() {
	}

	protected function _after() {
	}

	public function testCanCreateInstance() {
		$instance = new Where($this->createIdentifierDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

}
