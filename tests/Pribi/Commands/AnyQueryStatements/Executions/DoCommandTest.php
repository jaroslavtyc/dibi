<?php
namespace Pribi\Commands\AnyQueryStatements\Executions;

class DoCommandTest extends \Tests\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new DoCommand($this->createIdentifierDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}
}
