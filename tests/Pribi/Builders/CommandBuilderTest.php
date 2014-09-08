<?php
namespace Pribi\Builders;

class CommandBuilderTest extends \Tests\Helpers\CommandTestCase {

	public function testInstanceCanBeCreated() {
		$instance = new CommandBuilder($this->createExecutorDummy());
		$this->assertNotNull($instance);
	}
}
