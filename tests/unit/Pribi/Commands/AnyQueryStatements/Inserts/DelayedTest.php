<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class DelayedTest extends \tests\unit\helpers\CommandTestCase {

	public function testNoFollowingStatementIsMissingOrExcessive() {
		$this->huntUnexpectedFollowingStatements();
	}

	public function testCanCreateInstance() {
		$instance = new Delayed($this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsDelayedKeyword() {
		$toSqlMethod = new \ReflectionMethod(Delayed::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$delayed = $this->createDelayed($this->getCommandsBuilderDummy());
		$this->assertSame('DELAYED', $toSqlMethod->invoke($delayed));
	}

	private function createDelayed(\Pribi\Builders\Commands\Builder $commandBuilder) {
		return new Delayed($this->createCommandDummy(), $commandBuilder);
	}

	public function testCanBeFollowedByIgnore() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$delayed = $this->createDelayed($commandBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createIgnore')
			->with($delayed)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $delayed->ignore());
	}

	public function testCanBeFollowedByInto() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnIdentifiersDummy = $this->createIdentifiersDummy();
		$partitionIdentifiersDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$delayed = $this->createDelayed($commandBuilderMock);
		$createdStatementDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnIdentifiersDummy, $partitionIdentifiersDummy, $delayed)
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
		$this->assertSame($createdStatementDummy, $delayed->into($tableName, $columnNames, $partitionNames));
	}
}
