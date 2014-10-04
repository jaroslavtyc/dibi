<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class HighPriorityTest extends \tests\unit\helpers\StatementTestCase {

	public function testNoFollowingStatementIsMissingOrExcessive() {
		$this->huntUnexpectedFollowingStatements();
	}

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

	private function createHighPriority(\Pribi\Builders\Commands\Builder $commandBuilder) {
		return new HighPriority($this->createCommandDummy(), $commandBuilder);
	}

	public function testCanBeFollowedByIgnore() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$highPriority = $this->createHighPriority($commandBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createIgnore')
			->with($highPriority)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $highPriority->ignore());
	}

	public function testCanBeFollowedByInto() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnsIdentifierDummy = $this->createIdentifiersDummy();
		$partitionIdentifiersDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$highPriority = $this->createHighPriority($commandBuilderMock);
		$createdStatementDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnsIdentifierDummy, $partitionIdentifiersDummy, $highPriority)
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
			->willReturn($columnsIdentifierDummy);
		$commandBuilderMock
			->expects($this->at(2))
			->method('createIdentifiers')
			->with($partitionNames)
			->willReturn($partitionIdentifiersDummy);
		$this->assertSame($createdStatementDummy, $highPriority->into($tableName, $columnNames, $partitionNames));
	}
}
