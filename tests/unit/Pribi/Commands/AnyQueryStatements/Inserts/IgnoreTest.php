<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class IgnoreTest extends \tests\unit\helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new Ignore($this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsIgnoreKeyword() {
		$toSqlMethod = new \ReflectionMethod(Ignore::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$ignore = $this->createIgnore($this->getCommandsBuilderDummy());
		$this->assertSame('IGNORE', $toSqlMethod->invoke($ignore));
	}

	private function createIgnore(\Pribi\Builders\Commands\Builder $commandBuilder) {
		return new Ignore($this->createCommandDummy(), $commandBuilder);
	}

	public function testCanBeFollowedByInto() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnIdentifiersDummy = $this->createIdentifiersDummy();
		$partitionIdentifiersDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$ignore = $this->createIgnore($commandBuilderMock);
		$intoDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilderMock */
		$commandBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnIdentifiersDummy, $partitionIdentifiersDummy, $ignore)
			->willReturn($intoDummy);
		$tableName = 'bar';
		$columnNames = ['baz', 'qux'];
		$partitionNames = ['foobar', 'foobaz'];
		$commandBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($tableIdentifierDummy);
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
		$this->assertSame($intoDummy, $ignore->into($tableName, $columnNames, $partitionNames));
	}
}
