<?php
namespace Pribi\Commands\Openers;

class QueryTest extends \Tests\Helpers\TestCase {

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
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$query = $this->createQuery($commandsBuilderMock);
		$commandsBuilderMock
			->expects($this->once())
			->method('createInsertInto')
			->willReturn($this->getMockBuilder(\Pribi\Commands\Statements\Inserts\InsertInto::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$tableName = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$columnNames = ['bar_column', 'baz_column'];
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifiers')
			->with($columnNames)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifiers::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$query->insertInto($tableName, $columnNames);
	}

	private function createQuery(\Pribi\Builders\CommandsBuilder $commandsBuilder) {
		return new Query($commandsBuilder);
	}

	public function testCanInsertIgnoreInto() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$query = $this->createQuery($commandsBuilderMock);
		$commandsBuilderMock
			->expects($this->once())
			->method('createInsertIgnoreInto')
			->willReturn($this->getMockBuilder(\Pribi\Commands\Statements\Inserts\InsertIgnoreInto::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$tableName = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($tableName)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$columnNames = ['bar_column', 'baz_column'];
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifiers')
			->with($columnNames)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifiers::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$query->insertIgnoreInto($tableName, $columnNames);
	}

	public function testCanSelect() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$query = $this->createQuery($commandsBuilderMock);
		$commandsBuilderMock
			->expects($this->once())
			->method('createSelect')
			->willReturn($this->getMockBuilder(\Pribi\Commands\Statements\Inserts\InsertInto::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$subject = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($subject)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$query->select($subject);
	}

	public function testCanDelete() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$query = $this->createQuery($commandsBuilderMock);
		$commandsBuilderMock
			->expects($this->once())
			->method('createDelete')
			->willReturn($this->getMockBuilder(\Pribi\Commands\Statements\Inserts\InsertInto::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$subject = 'foo';
		$commandsBuilderMock
			->expects($this->once())
			->method('createIdentifier')
			->with($subject)
			->willReturn($this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$query->delete($subject);
	}

	public function testCanStartTransaction() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$query = $this->createQuery($commandsBuilderMock);
		$commandsBuilderMock
			->expects($this->once())
			->method('createStartTransaction')
			->willReturn($this->getMockBuilder(\Pribi\Commands\Statements\Inserts\InsertInto::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$query->startTransaction();
	}

	public function testCanBegin() {
		$commandsBuilderMock = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$query = $this->createQuery($commandsBuilderMock);
		$commandsBuilderMock
			->expects($this->once())
			->method('createBegin')
			->willReturn($this->getMockBuilder(\Pribi\Commands\Statements\Inserts\InsertInto::class)
					->disableOriginalConstructor()
					->getMock()
			);
		$query->begin();
	}
}
