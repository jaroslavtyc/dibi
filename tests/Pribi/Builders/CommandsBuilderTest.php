<?php
namespace Pribi\Builders;

class CommandsBuilderTest extends \PHPUnit_Framework_TestCase {

	public function testInstanceCanBeCreated() {
		$instance = new CommandBuilder();
		$this->assertNotNull($instance);
	}
}
