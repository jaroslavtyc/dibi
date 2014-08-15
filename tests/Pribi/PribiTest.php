<?php
namespace Pribi;

class PribiCommandTest extends \Tests\Helpers\CommandTestCase {

	public function testInstanceCanBeCreated() {
		$instance = new Pribi($this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testCanOpenQuery() {
		$commandBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$pribi = $this->createPribi($commandBuilderMock);
		$commandBuilderMock->expects($this->once())
			->method('createQuery')
			->with() // no parameters expected
			->willReturn('foo');
		$this->assertEquals('foo', $pribi->createQuery());
	}

	private function createPribi(\Pribi\Builders\CommandBuilder $commandBuilder) {
		return new Pribi($commandBuilder);
	}

	public function testCanGiveSubQuery() {
		$commandBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$pribi = $this->createPribi($commandBuilderMock);
		$commandBuilderMock->expects($this->once())
			->method('createSubQuery')
			->with() // no parameters expected
			->willReturn('foo');
		$this->assertEquals('foo', $pribi->createSubQuery());
	}
}
