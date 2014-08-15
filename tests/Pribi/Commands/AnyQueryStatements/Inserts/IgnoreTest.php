<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class IgnoreTest extends \Tests\Helpers\CommandTestCase {

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

	private function createIgnore(\Pribi\Builders\CommandBuilder $commandBuilder) {
		return new Ignore($this->createCommandDummy(), $commandBuilder);
	}

	public function testCanUseInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnIdentifiersDummy = $this->createIdentifiersDummy();
		$partitionIdentifiersDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$ignore = $this->createIgnore($commandsBuilderMock);
		$intoDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnIdentifiersDummy, $partitionIdentifiersDummy, $ignore)
			->willReturn($intoDummy);
		$tableName = 'bar';
		$columnNames = ['baz', 'qux'];
		$partitionNames = ['foobar', 'foobaz'];
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($tableIdentifierDummy);
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
		$this->assertSame($intoDummy, $ignore->into($tableName, $columnNames, $partitionNames));
	}

}
