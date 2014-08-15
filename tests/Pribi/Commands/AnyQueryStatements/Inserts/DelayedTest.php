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

	private function createDelayed(\Pribi\Builders\CommandBuilder $commandBuilder) {
		return new Delayed($this->createCommandDummy(), $commandBuilder);
	}

	public function testCanUseIgnore() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
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
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$tableIdentifierDummy = $this->createIdentifierDummy();
		$columnIdentifiersDummy = $this->createIdentifiersDummy();
		$partitionIdentifiersDummy = $this->createIdentifiersDummy();
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$delayed = $this->createDelayed($commandsBuilderMock);
		$createdStatementDummy = 'foo';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandsBuilderMock */
		$commandsBuilderMock
			->expects($this->once())
			->method('createInto')
			->with($tableIdentifierDummy, $columnIdentifiersDummy, $partitionIdentifiersDummy, $delayed)
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
		$this->assertSame($createdStatementDummy, $delayed->into($tableName, $columnNames, $partitionNames));
	}
}
