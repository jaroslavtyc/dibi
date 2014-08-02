<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

use Tests\Helpers\CommandTestCase;

class InsertTest extends CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new Insert($this->getCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
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
					->setConstructorArgs([$this->getCommandDummy(), $commandsBuilderMock])
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
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createInto')
			->willReturn($createdStatementDummy);
		$tableName = 'bar';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$columnNames = ['baz', 'qux'];
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifiers')
			->with($columnNames)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifiers::class)
					->disableOriginalConstructor()
					->getMock()
			);
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$insert = $this->createInsert($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $insert->into($tableName, $columnNames));
	}

	private function createInsert(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		return new Insert($this->getCommandDummy(), $commandsBuilder);
	}
}
 