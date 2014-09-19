<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions;

class FromTest extends \Tests\Helpers\CommandTestCase {

	public function testInstanceCanBeCreated() {
		$instance = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsFromKeywordFollowedByTableName() {
		$toSqlMethod = new \ReflectionMethod(From::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$tableIdentifier = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$tableName = 'foo';
		$tableIdentifier->expects($this->once())
			->method('toSql')
			->willReturn($tableName);
		/** @var \Pribi\Commands\Identifiers\Identifier $tableIdentifier */
		$highPriority = new From($tableIdentifier, $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertSame("FROM $tableName", $toSqlMethod->invoke($highPriority));
	}

	public function testCanBeFollowedByAs() {
		$toSqlMethod = new \ReflectionMethod(From::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$tableIdentifier = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->getMock();
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Commands\Identifiers\Identifier $tableIdentifier */
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$from = new From($tableIdentifier, $this->createCommandDummy(), $commandBuilder);
		$aliasName = 'bar';
		$aliasIdentifier = $this->createIdentifierDummy();
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createIdentifier')
			->with($aliasName)
			->willReturn($aliasIdentifier);
		$aliasDummy = 'baz';
		$commandBuilder->expects($this->once())
			->method('createAnyQueryFromAlias')
			->with($aliasIdentifier, $from)
			->willReturn($aliasDummy);
		$this->assertSame($aliasDummy, $from->as('bar'));
	}

	public function testCanBeFollowedByInnerJoin() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$from = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$tableName = 'foo';
		$innerJoinDummy = 'bar';
		$tableIdentifierDummy = $this->createIdentifierDummy();
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($tableIdentifierDummy);
		$commandBuilder->expects($this->once())
			->method('createAnyQueryInnerJoin')
			->with($tableIdentifierDummy)
			->willReturn($innerJoinDummy);
		$this->assertSame($innerJoinDummy, $from->innerJoin($tableName));
	}

	public function testCanBeFollowedByLeftJoin() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$from = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$tableName = 'foo';
		$leftJoinDummy = 'bar';
		$tableIdentifierDummy = $this->createIdentifierDummy();
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($tableIdentifierDummy);
		$commandBuilder->expects($this->once())
			->method('createAnyQueryLeftJoin')
			->with($tableIdentifierDummy)
			->willReturn($leftJoinDummy);
		$this->assertSame($leftJoinDummy, $from->leftJoin($tableName));
	}

	public function testCanBeFollowedByRightJoin() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$from = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$tableName = 'foo';
		$rightJoinDummy = 'bar';
		$tableIdentifierDummy = $this->createIdentifierDummy();
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($tableIdentifierDummy);
		$commandBuilder->expects($this->once())
			->method('createAnyQueryRightJoin')
			->with($tableIdentifierDummy)
			->willReturn($rightJoinDummy);
		$this->assertSame($rightJoinDummy, $from->rightJoin($tableName));
	}

	public function testCanBeFollowedByWhere() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$from = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$subjectName = 'foo';
		$whereDummy = 'bar';
		$tableIdentifierDummy = $this->createIdentifierDummy();
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createIdentifier')
			->with($subjectName)
			->willReturn($tableIdentifierDummy);
		$commandBuilder->expects($this->once())
			->method('createAnyQueryWhere')
			->with($tableIdentifierDummy)
			->willReturn($whereDummy);
		$this->assertSame($whereDummy, $from->where($subjectName));
	}

	public function testCanBeFollowedByWhereNot() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$from = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$subjectName = 'foo';
		$whereNotDummy = 'bar';
		$tableIdentifierDummy = $this->createIdentifierDummy();
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createIdentifier')
			->with($subjectName)
			->willReturn($tableIdentifierDummy);
		$commandBuilder->expects($this->once())
			->method('createAnyQueryWhereNot')
			->with($tableIdentifierDummy)
			->willReturn($whereNotDummy);
		$this->assertSame($whereNotDummy, $from->whereNot($subjectName));
	}

	public function testCanBeFollowedByLimit() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$from = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$limitAmount = 'foo';
		$limitDummy = 'bar';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createAnyQueryLimit')
			->with(0, $limitAmount)
			->willReturn($limitDummy);
		$this->assertSame($limitDummy, $from->limit($limitAmount));
	}

	public function testCanBeFollowedByOffsetAndLimit() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$from = new From($this->createIdentifierDummy(), $this->createCommandDummy(), $commandBuilder);
		$offsetAmount = 'baz';
		$limitAmount = 'foo';
		$limitDummy = 'bar';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createAnyQueryLimit')
			->with($offsetAmount, $limitAmount)
			->willReturn($limitDummy);
		$this->assertSame($limitDummy, $from->offsetAndLimit($offsetAmount, $limitAmount));
	}
}
