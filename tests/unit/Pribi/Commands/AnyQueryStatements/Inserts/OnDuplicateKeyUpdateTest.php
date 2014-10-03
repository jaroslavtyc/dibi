<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class OnDuplicateKeyUpdateTest extends \tests\unit\helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new OnDuplicateKeyUpdate($this->createIdentifierDummy(), $this->createSubjectDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsOnDuplicateKeyUpdateKeywordFollowedByIdentifierEqualToExpression() {
		$toSqlMethod = $this->createToSqlReflectionMethod(OnDuplicateKeyUpdate::class);
		$identifierMock = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$identifierMock->expects($this->once())
			->method('toSql')
			->willReturn($identifierAsSql = 'foo');
		$expressionMock = $this->getMockBuilder(\Pribi\Commands\Subjects\Subject::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$expressionMock->expects($this->once())
			->method('toSql')
			->willReturn($expressionAsSql = 'bar');
		/**
		 * @var \Pribi\Commands\Identifiers\Identifier $identifierMock
		 * @var \Pribi\Commands\Subjects\Subject $expressionMock
		 */
		$onDuplicateKeyUpdate = new OnDuplicateKeyUpdate($identifierMock, $expressionMock, $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertSame("ON DUPLICATE KEY UPDATE $identifierAsSql=$expressionAsSql", $toSqlMethod->invoke($onDuplicateKeyUpdate));
	}

	public function testAsSqlIfChainedIsCommaFollowedByIdentifierEqualToExpression() {
		$toSqlMethod = $this->createToSqlReflectionMethod(OnDuplicateKeyUpdate::class);
		$identifierMock = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$identifierMock->expects($this->once())
			->method('toSql')
			->willReturn($identifierAsSql = 'foo');
		$expressionMock = $this->getMockBuilder(\Pribi\Commands\Subjects\Subject::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$expressionMock->expects($this->once())
			->method('toSql')
			->willReturn($expressionAsSql = 'bar');
		/**
		 * @var \Pribi\Commands\Identifiers\Identifier $identifierMock
		 * @var \Pribi\Commands\Subjects\Subject $expressionMock
		 */
		$onDuplicateKeyUpdate = new OnDuplicateKeyUpdate(
			$identifierMock,
			$expressionMock,
			$this->getMockBuilder(OnDuplicateKeyUpdate::class)->disableOriginalConstructor()->getMock(),
			$this->getCommandsBuilderDummy()
		);
		$this->assertSame(",$identifierAsSql=$expressionAsSql", $toSqlMethod->invoke($onDuplicateKeyUpdate));
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
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$onDuplicateKeyUpdate = new OnDuplicateKeyUpdate($this->createIdentifierDummy(), $this->createSubjectDummy(), $this->createCommandDummy(), $commandBuilderMock);
		$this->assertSame($onDuplicateKeyUpdateDummy, $onDuplicateKeyUpdate->onDuplicateKeyUpdate($columnName, $expression));
	}
}
