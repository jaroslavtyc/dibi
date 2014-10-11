<?php
namespace tests\unit\Pribi\Commands\AnyQueryStatements\FromDefinitions;

abstract class FromBaseTestHelper extends \tests\unit\helpers\StatementTestCase {

	abstract public function testCanCreateInstance();

	abstract public function testAsSqlIsExpectedKeywordFollowedByTableName();

	public function testCanBeFollowedByInnerJoin() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$fromLike = $this->createNewInstance($this->createIdentifierDummy(), $this->createPrependCommandDummy(), $commandBuilder);
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
		/** @var \Pribi\Commands\AnyQueryStatements\FromDefinitions\Parts\FromLike $fromLike */
		$this->assertSame($innerJoinDummy, $fromLike->innerJoin($tableName));
	}

	abstract protected function createPrependCommandDummy();

	protected function createNewInstance(
		\Pribi\Commands\Identifiers\Identifier $identifier,
		\Pribi\Commands\Command $prependCommand,
		\Pribi\Builders\Commands\Builder $commandBuilder
	) {
		return new $this->testedClassName($identifier, $prependCommand, $commandBuilder);
	}

	public function testCanBeFollowedByLeftJoin() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$fromLike = $this->createNewInstance($this->createIdentifierDummy(), $this->createPrependCommandDummy(), $commandBuilder);
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
		/** @var \Pribi\Commands\AnyQueryStatements\FromDefinitions\Parts\FromLike $fromLike */
		$this->assertSame($leftJoinDummy, $fromLike->leftJoin($tableName));
	}

	public function testCanBeFollowedByRightJoin() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$fromLike = $this->createNewInstance($this->createIdentifierDummy(), $this->createPrependCommandDummy(), $commandBuilder);
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
		/** @var \Pribi\Commands\AnyQueryStatements\FromDefinitions\Parts\FromLike $fromLike */
		$this->assertSame($rightJoinDummy, $fromLike->rightJoin($tableName));
	}

	public function testCanBeFollowedByWhere() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$fromLike = $this->createNewInstance($this->createIdentifierDummy(), $this->createPrependCommandDummy(), $commandBuilder);
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
		/** @var \Pribi\Commands\AnyQueryStatements\FromDefinitions\Parts\FromLike $fromLike */
		$this->assertSame($whereDummy, $fromLike->where($subjectName));
	}

	public function testCanBeFollowedByWhereNot() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$fromLike = $this->createNewInstance($this->createIdentifierDummy(), $this->createPrependCommandDummy(), $commandBuilder);
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
		/** @var \Pribi\Commands\AnyQueryStatements\FromDefinitions\Parts\FromLike $fromLike */
		$this->assertSame($whereNotDummy, $fromLike->whereNot($subjectName));
	}

	public function testCanBeFollowedByLimit() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$fromLike = $this->createNewInstance($this->createIdentifierDummy(), $this->createPrependCommandDummy(), $commandBuilder);
		$limitAmount = 'foo';
		$limitDummy = 'bar';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createAnyQueryLimit')
			->with(0, $limitAmount)
			->willReturn($limitDummy);
		/** @var \Pribi\Commands\AnyQueryStatements\FromDefinitions\Parts\FromLike $fromLike */
		$this->assertSame($limitDummy, $fromLike->limit($limitAmount));
	}

	public function testCanBeFollowedByOffsetAndLimit() {
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$fromLike = $this->createNewInstance($this->createIdentifierDummy(), $this->createPrependCommandDummy(), $commandBuilder);
		$offsetAmount = 'baz';
		$limitAmount = 'foo';
		$limitDummy = 'bar';
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createAnyQueryLimit')
			->with($offsetAmount, $limitAmount)
			->willReturn($limitDummy);
		/** @var \Pribi\Commands\AnyQueryStatements\FromDefinitions\Parts\FromLike $fromLike */
		$this->assertSame($limitDummy, $fromLike->offsetAndLimit($offsetAmount, $limitAmount));
	}
}
