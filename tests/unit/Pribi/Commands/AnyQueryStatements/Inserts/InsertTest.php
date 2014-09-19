<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class InsertTest extends \Tests\Unit\Helpers\CommandTestCase {

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

	private function createInsert(\Pribi\Builders\Commands\Builder $commandBuilder) {
		return new Insert($this->createCommandDummy(), $commandBuilder);
	}

	public function testCanUseLowPriority() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$insert = $this->createInsert($commandBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createLowPriority')
			->with($insert)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $insert->lowPriority());
	}

	public function testCanUseHighPriority() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$insert = $this->createInsert($commandBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createHighPriority')
			->with($insert)
			->willReturn($highPriorityDummy = 'foo');
		$this->assertSame($highPriorityDummy, $insert->highPriority());
	}

	public function testCanUseDelayed() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$insert = $this->createInsert($commandBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createDelayed')
			->with($insert)
			->willReturn($delayedDummy = 'foo');
		$this->assertSame($delayedDummy, $insert->delayed());
	}

	public function testCanBeFollowedByIgnore() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$insert = $this->createInsert($commandBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createIgnore')
			->with($insert)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $insert->ignore());
	}

	public function testCanBeFollowedByInto() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnIdentifiersDummy = $this->createIdentifiersDummy();
		$partitionIdentifiersDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$insert = $this->createInsert($commandBuilderMock);
		$createdStatementDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnIdentifiersDummy, $partitionIdentifiersDummy, $insert)
			->willReturn($createdStatementDummy);
		$tableName = 'bar';
		$commandBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($tableIdentifierDummy);
		$columnNames = ['baz', 'qux'];
		$partitionNames = ['foobar', 'foobaz'];
		$commandBuilderMock
			->expects($this->at(1))
			->method('createIdentifiers')
			->with($columnNames)
			->willReturn($columnIdentifiersDummy);
		$commandBuilderMock
			->expects($this->at(2))
			->method('createIdentifiers')
			->with($partitionNames)
			->willReturn($partitionIdentifiersDummy);
		$this->assertSame($createdStatementDummy, $insert->into($tableName, $columnNames, $partitionNames));
	}
}
