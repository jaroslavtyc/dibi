<?php
namespace Pribi;

class PribiTest extends \Tests\Helpers\TestCase {

	public function testInstanceCanBeCreated() {
		$instance = new Pribi($this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testCanOpenQuery() {
		$commandBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$pribi = $this->createPribi($commandBuilderMock);
		$commandBuilderMock->expects($this->once())
			->method('createQuery')
			->with() // no parameters expected
			->willReturn('foo');
		$this->assertEquals('foo', $pribi->createQuery());
	}

	private function createPribi(\PHPUnit_Framework_MockObject_MockObject $commandsBuilder){
		/**
		 * @var \Pribi\Builders\CommandsBuilder $commandsBuilder
		 */
		return new Pribi($commandsBuilder);
	}

	public function testCanGiveSubcondition() {
		$commandBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$pribi = $this->createPribi($commandBuilderMock);
		$commandBuilderMock->expects($this->once())
			->method('createSubcondition')
			->with() // no parameters expected
			->willReturn('foo');
		$this->assertEquals('foo', $pribi->craeteSubcondition());
	}
}
