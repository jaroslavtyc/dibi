<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class IntoTest extends \Tests\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new Into(
			$this->createIdentifierDummy(),
			$this->createIdentifiersDummy(),
			$this->createIdentifiersDummy(),
			$this->createCommandDummy(),
			$this->getCommandsBuilderDummy()
		);
		$this->assertNotNull($instance);
	}

	public function testAsSqlWithoutColumnsAndPartitionsIsOnlyWithTable() {
		$tableName = 'foo';
		$into = $this->createInstanceToSqlTest($tableName);
		$toSqlMethod = $this->createAccessibleToSqlMethod();
		$this->assertSame("INTO $tableName", $toSqlMethod->invoke($into));
	}

	public function testAsSqlWithoutPartitionsIsOnlyWithTableAndColumns() {
		$tableName = 'foo';
		$columnsAsSql = 'bar';
		$into = $this->createInstanceToSqlTest($tableName, $columnsAsSql);
		$toSqlMethod = $this->createAccessibleToSqlMethod();
		$this->assertSame("INTO $tableName ($columnsAsSql)", $toSqlMethod->invoke($into));
	}

	public function testAsSqlWithoutColumnsIsOnlyWithTableAndPartitions() {
		$tableName = 'foo';
		$partitionsAsSql = 'baz';
		$into = $this->createInstanceToSqlTest($tableName, FALSE, $partitionsAsSql);
		$toSqlMethod = $this->createAccessibleToSqlMethod();
		$this->assertSame("INTO $tableName PARTITION ($partitionsAsSql)", $toSqlMethod->invoke($into));
	}

	public function testAsSqlWithColumnsAndPartitionsIsWithThem() {
		$tableName = 'foo';
		$columnsAsSql = 'bar';
		$partitionsAsSql = 'baz';
		$into = $this->createInstanceToSqlTest($tableName, $columnsAsSql, $partitionsAsSql);
		$toSqlMethod = $this->createAccessibleToSqlMethod();
		$this->assertSame("INTO $tableName PARTITION ($partitionsAsSql) ($columnsAsSql)", $toSqlMethod->invoke($into));
	}

	private function createInstanceToSqlTest($tableName, $columnsAsSql = FALSE, $partitionsAsSql = FALSE) {
		$tableIdentifierMock = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$tableIdentifierMock->expects($this->once())
			->method('toSql')
			->with() // no parameters expected
			->willReturn($tableName);
		$columnIdentifiersMock = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifiers::class)
			->disableOriginalConstructor()
			->setMethods(['toSql', 'count'])
			->getMock();
		if ($columnsAsSql !== FALSE) {
			$columnIdentifiersMock->expects($this->once())
				->method('count')
				->with() // no parameters expected
				->willReturn(1);
			$columnIdentifiersMock->expects($this->once())
				->method('toSql')
				->with() // no parameters expected
				->willReturn($columnsAsSql);
		} else {
			$columnIdentifiersMock->expects($this->once())
				->method('count')
				->with() // no parameters expected
				->willReturn(0);
			$columnIdentifiersMock->expects($this->never())
				->method('toSql');
		}
		$partitionIdentifiersMock = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifiers::class)
			->disableOriginalConstructor()
			->setMethods(['toSql', 'count'])
			->getMock();
		if ($partitionsAsSql !== FALSE) {
			$partitionIdentifiersMock->expects($this->once())
				->method('count')
				->with() // no parameters expected
				->willReturn(1);
			$partitionIdentifiersMock->expects($this->once())
				->method('toSql')
				->with() // no parameters expected
				->willReturn($partitionsAsSql);
		} else {
			$partitionIdentifiersMock->expects($this->once())
				->method('count')
				->with() // no parameters expected
				->willReturn(0);
			$partitionIdentifiersMock->expects($this->never())
				->method('toSql');
		}

		/** @var \Pribi\Commands\Identifiers\Identifier $tableIdentifierMock */
		/** @var \Pribi\Commands\Identifiers\Identifiers $columnIdentifiersMock */
		/** @var \Pribi\Commands\Identifiers\Identifiers $partitionIdentifiersMock */
		return new Into(
			$tableIdentifierMock,
			$columnIdentifiersMock,
			$partitionIdentifiersMock,
			$this->createCommandDummy(),
			$this->getCommandsBuilderDummy()
		);
	}

	private function createAccessibleToSqlMethod() {
		$toSqlMethod = new \ReflectionMethod(Into::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		return $toSqlMethod;
	}

	public function testCanBeFollowedByValues() {
		$commandBuilderMock = $this->getMockBuilder(\Pribi\Builders\CommandBuilder::class)
			->setMethods(['createValues', 'createSubjects'])
			->getMock();
		$values = ['foo', 'bar'];
		$valueSubjectsDummy = $this->createSubjectsDummy();
		$valueIdentifiersDummy = 'foobar';
		$commandBuilderMock->expects($this->once())
			->method('createValues')
			->with($valueSubjectsDummy)
			->willReturn($valueIdentifiersDummy);
		$commandBuilderMock->expects($this->once())
			->method('createSubjects')
			->with($values)
			->willReturn($valueSubjectsDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandBuilderMock */
		$into = $this->createInto($commandBuilderMock);
		$this->assertSame($valueIdentifiersDummy, $into->values($values));
	}

	private function createInto(\Pribi\Builders\CommandBuilder $commandBuilder) {
		return new Into(
			$this->createIdentifierDummy(),
			$this->createIdentifiersDummy(),
			$this->createIdentifiersDummy(),
			$this->createCommandDummy(),
			$commandBuilder
		);
	}

	public function testCanBeFollowedBySet() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$columnName = 'foo';
		$expression = 'bar';
		$columnIdentifierDummy = $this->createIdentifierDummy();
		$expressionSubjectDummy = $this->createSubjectDummy();
		$setDummy = 'baz';
		$commandBuilderMock->expects($this->once())
			->method('createIdentifier')
			->with($columnName)
			->willReturn($columnIdentifierDummy);
		$commandBuilderMock->expects($this->once())
			->method('createSubject')
			->with($expression)
			->willReturn($expressionSubjectDummy);
		$commandBuilderMock->expects($this->once())
			->method('createAnyQuerySet')
			->with($columnIdentifierDummy, $expressionSubjectDummy)
			->willReturn($setDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandBuilderMock */
		$into = $this->createInto($commandBuilderMock);
		$this->assertSame($setDummy, $into->set($columnName, $expression));
	}

	public function testCanBeFollowedBySelect() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$columnName = 'foo';
		$expression = 'bar';
		$columnIdentifierDummy = $this->createIdentifierDummy();
		$expressionSubjectDummy = $this->createSubjectDummy();
		$setDummy = 'baz';
		$commandBuilderMock->expects($this->once())
			->method('createIdentifier')
			->with($columnName)
			->willReturn($columnIdentifierDummy);
		$commandBuilderMock->expects($this->once())
			->method('createSubject')
			->with($expression)
			->willReturn($expressionSubjectDummy);
		$commandBuilderMock->expects($this->once())
			->method('createAnyQuerySet')
			->with($columnIdentifierDummy, $expressionSubjectDummy)
			->willReturn($setDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandBuilderMock */
		$into = $this->createInto($commandBuilderMock);
		$this->assertSame($setDummy, $into->set($columnName, $expression));
	}
}