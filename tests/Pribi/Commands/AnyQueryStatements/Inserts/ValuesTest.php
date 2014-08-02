<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class ValuesTest extends \Tests\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		/** @var \Pribi\Commands\Subjects\Subjects $subjects */
		$subjects = $this->getMockBuilder(\Pribi\Commands\Subjects\Subjects::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var \Pribi\Commands\Command $previousCommandMock */
		$previousCommandMock = $this->getMockBuilder(\Pribi\Commands\Command::class)
			->disableOriginalConstructor()
			->getMockForAbstractClass();

		$instance = new Values($subjects, $previousCommandMock, $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}
}
 