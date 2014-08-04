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

	private function createIgnore(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		return new Ignore($this->createCommandDummy(), $commandsBuilder);
	}

	public function testCanUseInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$ignore = $this->createIgnore($commandsBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$tableName = 'bar';
		$columnNames = ['baz', 'qux'];
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($tableIdentifierDummy = $this->createIdentifierDummy());
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifiers')
			->with($columnNames)
			->willReturn($columnsIdentifierDummy = $this->createIdentifiersDummy());
		$commandsBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnsIdentifierDummy, $ignore)
			->willReturn($intoDummy = 'foo');
		$this->assertSame($intoDummy, $ignore->into($tableName, $columnNames));
	}

}
 