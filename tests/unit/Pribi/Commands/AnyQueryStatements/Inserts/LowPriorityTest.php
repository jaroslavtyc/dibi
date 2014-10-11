<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class LowPriorityTest extends \tests\unit\helpers\StatementTestCase {

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

	private function createLowPriority(\Pribi\Builders\Commands\Builder $commandBuilder) {
		return new LowPriority($this->createCommandDummy(), $commandBuilder);
	}

	public function testCanBeFollowedByIgnore() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$lowPriority = $this->createLowPriority($commandBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createIgnore')
			->with($lowPriority)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $lowPriority->ignore());
	}

	public function testCanBeFollowedByInto() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnIdentifiersDummy = $this->createIdentifiersDummy();
		$partitionIdentifiersDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$lowPriority = $this->createLowPriority($commandBuilderMock);
		$createdStatementDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnIdentifiersDummy, $partitionIdentifiersDummy, $lowPriority)
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
		$this->assertSame($createdStatementDummy, $lowPriority->into($tableName, $columnNames, $partitionNames));
	}
}
