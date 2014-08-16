<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

use Tests\Helpers\CommandTestCase;

class InsertTest extends CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new Insert($this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsInsertKeyword() {
		$toSqlMethod = new \ReflectionMethod(Insert::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$insert = $this->createInsert($this->getCommandsBuilderDummy());
		$this->assertSame('INSERT', $toSqlMethod->invoke($insert));
	}

	private function createInsert(\Pribi\Builders\CommandBuilder $commandBuilder) {
		return new Insert($this->createCommandDummy(), $commandBuilder);
	}

	public function testCanUseLowPriority() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$insert = $this->createInsert($commandsBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createLowPriority')
			->with($insert)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $insert->lowPriority());
	}

	public function testCanUseHighPriority() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$insert = $this->createInsert($commandsBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createHighPriority')
			->with($insert)
			->willReturn($highPriorityDummy = 'foo');
		$this->assertSame($highPriorityDummy, $insert->highPriority());
	}

	public function testCanUseDelayed() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$insert = $this->createInsert($commandsBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createDelayed')
			->with($insert)
			->willReturn($delayedDummy = 'foo');
		$this->assertSame($delayedDummy, $insert->delayed());
	}

	public function testCanBeFollowedByIgnore() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$insert = $this->createInsert($commandsBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createIgnore')
			->with($insert)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $insert->ignore());
	}

	public function testCanBeFollowedByInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnIdentifiersDummy = $this->createIdentifiersDummy();
		$partitionIdentifiersDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$insert = $this->createInsert($commandsBuilderMock);
		$createdStatementDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnIdentifiersDummy, $partitionIdentifiersDummy, $insert)
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
		$this->assertSame($createdStatementDummy, $insert->into($tableName, $columnNames, $partitionNames));
	}
}