<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

use Tests\Helpers\CommandTestCase;

class InsertTest extends CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new Insert($this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testCanLowPriority() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$insert = $this->createInsert($commandsBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createLowPriority')
			->with($insert)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $insert->lowPriority());
	}

	public function testCantIgnoreInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$insert = $this->createInsert($commandsBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createIgnore')
			->with($insert)
			->willReturn($ignoreMock = $this->getMockBuilder(Ignore::class)
					->setConstructorArgs([$this->createCommandDummy(), $commandsBuilderMock])
					->getMock()
			);
		$ignoreMock
			->expects($this->once())
			->method('into')
			->with($tableName = 'bar', $columnNames = ['baz', 'qux'])
			->willReturn($intoDummy = 'foo');
		$this->assertSame($intoDummy, $insert->ignoreInto($tableName, $columnNames));
	}

	public function testCanInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnsIdentifierDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$insert = $this->createInsert($commandsBuilderMock);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnsIdentifierDummy, $insert)
			->willReturn($createdStatementDummy);
		$tableName = 'bar';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($tableIdentifierDummy);
		$columnNames = ['baz', 'qux'];
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifiers')
			->with($columnNames)
			->willReturn($columnsIdentifierDummy);
		$this->assertSame($createdStatementDummy, $insert->into($tableName, $columnNames));
	}

	private function createInsert(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		return new Insert($this->createCommandDummy(), $commandsBuilder);
	}
}
 