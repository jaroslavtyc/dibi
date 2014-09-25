<?php
namespace Pribi;

class PribiTest extends \tests\unit\helpers\CommandTestCase {

	public function testInstanceCanBeCreated() {
		$instance = new Pribi($this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testCanOpenQuery() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$pribi = $this->createPribi($commandBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock->expects($this->once())
			->method('createQueryInitializer')
			->with() // no parameters expected
			->willReturn('foo');
		$this->assertEquals('foo', $pribi->openQuery());
	}

	private function createPribi(\Pribi\Builders\Commands\Builder $commandBuilder) {
		return new Pribi($commandBuilder);
	}

	public function testCanGiveSubQuery() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$pribi = $this->createPribi($commandBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock->expects($this->once())
			->method('createSubQuery')
			->with() // no parameters expected
			->willReturn('foo');
		$this->assertEquals('foo', $pribi->startSubQuery());
	}
}
