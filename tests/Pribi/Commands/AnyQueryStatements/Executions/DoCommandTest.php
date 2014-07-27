<?php
namespace Pribi\Commands\AnyQueryStatements\Executions;

class DoCommandTest extends \Tests\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		/** @var \Pribi\Commands\Identifiers\Identifier $identifier */
		$identifier = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var \Pribi\Commands\Command $previousCommandMock */
		$previousCommandMock = $this->getMockBuilder(\Pribi\Commands\Command::class)
			->disableOriginalConstructor()
			->getMockForAbstractClass();

		$instance = new DoCommand($identifier, $previousCommandMock, $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}
}
 