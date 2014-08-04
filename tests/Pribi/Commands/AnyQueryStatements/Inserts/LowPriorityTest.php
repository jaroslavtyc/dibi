<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class LowPriorityTest extends \Tests\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$lowPriority = new LowPriority($this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($lowPriority);
	}

	public function testAsSqlIsLowPriorityKeyword() {
		$toSqlMethod = new \ReflectionMethod(LowPriority::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$lowPriority = $this->createLowPriority($this->getCommandsBuilderDummy());
		$this->assertSame('LOW PRIORITY', $toSqlMethod->invoke($lowPriority));
	}

	private function createLowPriority(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		return new LowPriority($this->createCommandDummy(), $commandsBuilder);
	}

	public function testCanUseIgnore() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$lowPriority = $this->createLowPriority($commandsBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createIgnore')
			->with($lowPriority)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $lowPriority->ignore());
	}

	public function testCanUseInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnsIdentifierDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$lowPriority = $this->createLowPriority($commandsBuilderMock);
		$createdStatementDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnsIdentifierDummy, $lowPriority)
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
		$this->assertSame($createdStatementDummy, $lowPriority->into($tableName, $columnNames));
	}
}
 