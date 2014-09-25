<?php
namespace Pribi\Commands\Openers;

class QueryInitializerTest extends \tests\unit\helpers\CommandTestCase {

	public function testInstanceCanBeCreated() {
		$instance = new QueryInitializer($this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsEmptyString() {
		$toSqlMethod = new \ReflectionMethod(QueryInitializer::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$this->assertSame('', $toSqlMethod->invoke(new QueryInitializer($this->getCommandsBuilderDummy())));
	}

	public function testCanInsertInto() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createInsert')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->insert());
	}

	private function createQuery(\Pribi\Builders\Commands\Builder $commandBuilder) {
		return new QueryInitializer($commandBuilder);
	}

	public function testCanSelect() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQuerySelect')
			->willReturn($createdStatementDummy);
		$subject = 'bar';
		$commandBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($subject)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->select($subject));
	}

	public function testCanUpdate() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQueryUpdate')
			->willReturn($createdStatementDummy);
		$subject = 'bar';
		$commandBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($subject)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->update($subject));
	}

	public function testCanDelete() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createDelete')
			->willReturn($createdStatementDummy);
		$subject = 'bar';
		$commandBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($subject)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->delete($subject));
	}

	public function testCanStartTransaction() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQueryStartTransaction')
			->willReturn($mainQueryStartTransactionDummy = 'foo');
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($mainQueryStartTransactionDummy, $query->startTransaction());
	}

	public function testCanBegin() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQueryBegin')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->begin());
	}

	public function testCanBeginWork() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQueryBeginWork')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->beginWork());
	}

	public function testCanCommit() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQueryCommit')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->commit());
	}

	public function testCanCommitWork() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQueryCommitWork')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->commitWork());
	}

	public function testCanDisableAutocommit() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQueryDisableAutocommit')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->disableAutocommit());
	}

	public function testCanEnableAutocommit() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQueryEnableAutocommit')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->enableAutocommit());
	}

	public function testCanRollback() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQueryRollback')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->rollback());
	}

	public function testCanRollbackWork() {
		$commandBuilderMock = $this->createCommandBuilderMock();
		$createdStatementDummy = 'foo';
		$commandBuilderMock
			->expects($this->once())
			->method('createMainQueryRollbackWork')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$query = $this->createQuery($commandBuilderMock);
		$this->assertSame($createdStatementDummy, $query->rollbackWork());
	}
}
