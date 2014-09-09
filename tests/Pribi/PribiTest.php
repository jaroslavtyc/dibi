<?php
namespace Pribi;

class PribiTest extends \Tests\Helpers\CommandTestCase {

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
			->method('createOpeningQuery')
			->with() // no parameters expected
			->willReturn('foo');
		$this->assertEquals('foo', $pribi->createOpeningQuery());
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
		$this->assertEquals('foo', $pribi->createSubQuery());
	}
}
