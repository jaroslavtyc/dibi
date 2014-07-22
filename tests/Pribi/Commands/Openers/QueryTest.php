<?php
namespace Pribi\Commands\Openers;

class QueryTest extends \Tests\Helpers\TestCase {

	public function testInstanceCanBeCreated() {
		$instance = new Query($this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testCanInsertInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$query = $this->createQuery($commandsBuilderMock);
		$commandsBuilderMock
			->expects($this->once())
			->method('createInsertInto')
			->willReturn($this->getMockBuilder(\Pribi\Commands\Inserts\InsertInto::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$tableName = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->setConstructorArgs([$tableName])
					->getMock()
			);
		$columnNames = ['bar_column', 'baz_column'];
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifiers')
			->with($columnNames)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifiers::class)
					->setConstructorArgs($columnNames)
					->getMock()
			);
		$query->insertInto($tableName, $columnNames);
	}

	private function createQuery(\PHPUnit_Framework_MockObject_MockObject $commandsBuilder) {
		/**
		 * @var \Pribi\Builders\CommandsBuilder $commandsBuilder
		 */
		return new Query($commandsBuilder);
	}
}
