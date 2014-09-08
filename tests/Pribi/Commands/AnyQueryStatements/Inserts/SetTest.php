<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class SetTest extends \Tests\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new Set($this->createIdentifierDummy(), $this->createSubjectDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsSetKeywordFollowedByTargetAndExpression() {
		$columnIdentifierDummy = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$columnName = 'foo';
		$columnIdentifierDummy->expects($this->once())
			->method('toSql')
			->with()
			->willReturn($columnName);
		$expressionSubjectDummy = $this->getMockBuilder(\Pribi\Commands\Subjects\Subject::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$expression = 'bar';
		$expressionSubjectDummy->expects($this->once())
			->method('toSql')
			->with()
			->willReturn($expression);
		/** @var \Pribi\Commands\Identifiers\Identifier $columnIdentifierDummy */
		/** @var \Pribi\Commands\Subjects\Subject $expressionSubjectDummy */
		$set = new Set($columnIdentifierDummy, $expressionSubjectDummy, $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$toSqlMethod = new \ReflectionMethod(Set::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$this->assertSame("SET $columnName=$expression", $toSqlMethod->invoke($set));
	}

	public function testCanBeFollowedByAnotherSet() {
		$columnName = 'foo';
		$expression = 'bar';
		$columnIdentifierDummy = $this->createIdentifierDummy();
		$expressionSubjectDummy = $this->createSubjectDummy();
		$setDummy = 'baz';
		$commandBuilderMock = $this->createCommandBuilderMock();
		$commandBuilderMock->expects($this->once())
			->method('createAnyQuerySet')
			->with($columnIdentifierDummy, $expressionSubjectDummy)
			->willReturn($setDummy);
		$commandBuilderMock->expects($this->once())
			->method('createIdentifier')
			->with($columnName)
			->willReturn($this->createIdentifierDummy());
		$commandBuilderMock->expects($this->once())
			->method('createSubject')
			->with($expression)
			->willReturn($this->createSubjectDummy());
		/** @var \Pribi\Builders\CommandBuilder $commandBuilderMock */
		$set = new Set($this->createIdentifierDummy(), $this->createSubjectDummy(), $this->createCommandDummy(), $commandBuilderMock);
		$this->assertSame($setDummy, $set->set($columnName, $expression));
	}

	public function testCanBeFollowedByOnDuplicateKeyUpdate() {
		$columnName = 'foo';
		$expression = 'bar';
		$columnIdentifierDummy = $this->createIdentifierDummy();
		$expressionSubjectDummy = $this->createSubjectDummy();
		$onDuplicateKeyUpdateDummy = 'foobaz';
		$commandBuilderMock = $this->createCommandBuilderMock();
		$commandBuilderMock->expects($this->once())
			->method('createOnDuplicateKeyUpdate')
			->with($columnIdentifierDummy, $expressionSubjectDummy)
			->willReturn($onDuplicateKeyUpdateDummy);
		$commandBuilderMock->expects($this->once())
			->method('createIdentifier')
			->with($columnName)
			->willReturn($columnIdentifierDummy);
		$commandBuilderMock->expects($this->once())
			->method('createSubject')
			->with($expression)
			->willReturn($expressionSubjectDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandBuilderMock */
		$set = new Set($this->createIdentifierDummy(), $this->createSubjectDummy(), $this->createCommandDummy(), $commandBuilderMock);
		$this->assertSame($onDuplicateKeyUpdateDummy, $set->onDuplicateKeyUpdate($columnName, $expression));
	}
}