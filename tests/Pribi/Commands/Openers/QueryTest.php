<?php
namespace Pribi\Commands\Openers;

class QueryCommandTest extends \Tests\Helpers\CommandTestCase {

	public function testInstanceCanBeCreated() {
		$instance = new Query($this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsEmptyString() {
		$toSqlMethod = new \ReflectionMethod(Query::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$this->assertSame('', $toSqlMethod->invoke(new Query($this->getCommandsBuilderDummy())));
	}

	public function testCanInsertInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createInsert')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->insert());
	}

	private function createQuery(\Pribi\Builders\CommandBuilder $commandBuilder) {
		return new Query($commandBuilder);
	}

	public function testCanSelect() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQuerySelect')
			->willReturn($createdStatementDummy);
		$subject = 'bar';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($subject)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->select($subject));
	}

	public function testCanUpdate() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQueryUpdate')
			->willReturn($createdStatementDummy);
		$subject = 'bar';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($subject)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->update($subject));
	}

	public function testCanDelete() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createDelete')
			->willReturn($createdStatementDummy);
		$subject = 'bar';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($subject)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->delete($subject));
	}

	public function testCanStartTransaction() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQueryStartTransaction')
			->willReturn($mainQueryStartTransactionDummy = 'foo');
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($mainQueryStartTransactionDummy, $query->startTransaction());
	}

	public function testCanBegin() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQueryBegin')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->begin());
	}

	public function testCanBeginWork() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQueryBeginWork')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->beginWork());
	}

	public function testCanCommit() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQueryCommit')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->commit());
	}

	public function testCanCommitWork() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQueryCommitWork')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->commitWork());
	}

	public function testCanDisableAutocommit() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQueryDisableAutocommit')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->disableAutocommit());
	}

	public function testCanEnableAutocommit() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQueryEnableAutocommit')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->enableAutocommit());
	}

	public function testCanRollback() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQueryRollback')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->rollback());
	}

	public function testCanRollbackWork() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandBuilder::class);
		$createdStatementDummy = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createMainQueryRollbackWork')
			->willReturn($createdStatementDummy);
		/** @var \Pribi\Builders\CommandBuilder $commandsBuilderMock */
		$query = $this->createQuery($commandsBuilderMock);
		$this->assertSame($createdStatementDummy, $query->rollbackWork());
	}
}
