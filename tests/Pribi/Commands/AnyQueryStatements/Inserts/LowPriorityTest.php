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

	private function createLowPriority(\Pribi\Builders\CommandBuilder $commandBuilder) {
		return new LowPriority($this->createCommandDummy(), $commandBuilder);
	}

	public function testCanUseIgnore() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
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
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnIdentifiersDummy = $this->createIdentifiersDummy();
		$partitionIdentifiersDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$lowPriority = $this->createLowPriority($commandsBuilderMock);
		$createdStatementDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnIdentifiersDummy, $partitionIdentifiersDummy, $lowPriority)
			->willReturn($createdStatementDummy);
		$tableName = 'bar';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($tableIdentifierDummy);
		$columnNames = ['baz', 'qux'];
		$partitionNames = ['foobar', 'foobaz'];
		$commandsBuilderMock
			->expects($this->at(1))
			->method('createIdentifiers')
			->with($columnNames)
			->willReturn($columnIdentifiersDummy);
		$commandsBuilderMock
			->expects($this->at(2))
			->method('createIdentifiers')
			->with($partitionNames)
			->willReturn($partitionIdentifiersDummy);
		$this->assertSame($createdStatementDummy, $lowPriority->into($tableName, $columnNames, $partitionNames));
	}
}
