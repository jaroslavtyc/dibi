<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class HighPriorityTest extends \Tests\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$highPriority = new HighPriority($this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($highPriority);
	}

	public function testAsSqlIsHighPriorityKeyword() {
		$toSqlMethod = new \ReflectionMethod(HighPriority::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$highPriority = $this->createHighPriority($this->getCommandsBuilderDummy());
		$this->assertSame('HIGH PRIORITY', $toSqlMethod->invoke($highPriority));
	}

	private function createHighPriority(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		return new HighPriority($this->createCommandDummy(), $commandsBuilder);
	}

	public function testCanUseIgnore() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$highPriority = $this->createHighPriority($commandsBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createIgnore')
			->with($highPriority)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $highPriority->ignore());
	}

	public function testCanUseInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnsIdentifierDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$highPriority = $this->createHighPriority($commandsBuilderMock);
		$createdStatementDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnsIdentifierDummy, $highPriority)
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
		$this->assertSame($createdStatementDummy, $highPriority->into($tableName, $columnNames));
	}

}
 