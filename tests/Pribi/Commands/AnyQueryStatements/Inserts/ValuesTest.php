<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class ValuesTest extends \Tests\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new Values($this->createSubjectsDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}
}
 