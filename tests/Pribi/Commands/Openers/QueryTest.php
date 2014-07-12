<?php
namespace Commands;

use Pribi\Builders\CommandsBuilder;
use Pribi\Commands\Deletions\Delete;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Inserts\InsertIgnoreInto;
use Pribi\Commands\Inserts\InsertInto;
use Pribi\Commands\Openers\Query;
use Pribi\Commands\Selects\Select;
use Pribi\Commands\Transactions\StartTransactions\StartTransaction;
use Tests\Helpers\TestCase;

class QueryTest extends TestCase {
	public function testQueryOpenerCanBeCreated() {
		$instance = new Query($this->getCommandsBuilderMock());
		$this->assertNotNull($instance);
		$this->assertEquals(Query::class, get_class($instance));
	}

	public function testQueryOpenerCanInsertInto() {
		$classReflection = new \ReflectionClass(Pribi::class);
		$this->assertTrue($classReflection->hasMethod('insertInto'));
		$methodReflection = $classReflection->getMethod('insertInto');
		$this->assertTrue($methodReflection->isPublic());
	}

	public function testQueryOpenerCanReturnInsertInto() {
		$commandBuilder = $this->getMock(CommandsBuilder::class, ['createIdentifier', 'createIdentifiers', 'createInsertInto']);
		$commandBuilder->expects($this->once())
			->method('createIdentifier')
			->with('foo')
			->willReturn($this->getMock(Identifier::class));
		$commandBuilder->expects($this->once())
			->method('createIdentifiers')
			->with('bar')
			->willReturn($this->getMock(Identifiers::class));
		$commandBuilder->expects($this->once())
			->method('createInsertInto')
			->with('bar')
			->willReturn($this->getMock(InsertInto::class));
		/**
		 * @var $commandBuilder CommandsBuilder
		 */
		$queryOpener = new Query($commandBuilder);
		$insertInto = $queryOpener->insertInto('foo', 'bar');
		$this->assertNotNull($insertInto);
		$this->assertEquals(InsertInto::class, get_class($insertInto));
	}

	public function testQueryOpenerCanInsertIgnoreInto() {
		$queryOpener = new Query();
		$queryOpener->insertIgnoreInto('foo', 'bar');
	}

	public function testQueryOpenerCanReturnInsertIgnoreInto() {
		$queryOpener = new Query();
		$insertIgnoreInto = $queryOpener->insertIgnoreInto('foo', 'bar');
		$this->assertNotNull($insertIgnoreInto);
		$this->assertEquals(InsertIgnoreInto::class, get_class($insertIgnoreInto));
	}

	public function testQueryOpenerCanSelect() {
		$queryOpener = new Query();
		$queryOpener->select('foo');
	}

	public function testQueryOpenerCanReturnSelect() {
		$queryOpener = new Query();
		$select = $queryOpener->select('foo');
		$this->assertNotNull($select);
		$this->assertEquals(Select::class, get_class($select));
	}

	public function testQueryOpenerCanDelete() {
		$queryOpener = new Query();
		$queryOpener->delete('foo');
	}

	public function testQueryOpenerCanReturnDelete() {
		$queryOpener = new Query();
		$delete = $queryOpener->delete();
		$this->assertNotNull($delete);
		$this->assertEquals(Delete::class, get_class($delete));
	}

	public function testQueryOpenerCanStartTransaction() {
		$queryOpener = new Query();
		$queryOpener->startTransaction();
	}

	public function testQueryOpenerCanReturnStartTransaction() {
		$queryOpener = new Query();
		$startTransaction = $queryOpener->startTransaction();
		$this->assertNotNull($startTransaction);
		$this->assertEquals(StartTransaction::class, get_class($startTransaction));
	}
}
