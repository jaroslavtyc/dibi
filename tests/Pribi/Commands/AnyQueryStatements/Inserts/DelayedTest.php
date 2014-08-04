<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class DelayedTest extends \Tests\Helpers\CommandTestCase {

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

	private function createDelayed(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		return new Delayed($this->createCommandDummy(), $commandsBuilder);
	}

	public function testCanUseIgnore() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$delayed = $this->createDelayed($commandsBuilderMock);
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createIgnore')
			->with($delayed)
			->willReturn($ignoreDummy = 'foo');
		$this->assertSame($ignoreDummy, $delayed->ignore());
	}

	public function testCanUseInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnsIdentifierDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilderMock */
		$delayed = $this->createDelayed($commandsBuilderMock);
		$createdStatementDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnsIdentifierDummy, $delayed)
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
		$this->assertSame($createdStatementDummy, $delayed->into($tableName, $columnNames));
	}
}
 