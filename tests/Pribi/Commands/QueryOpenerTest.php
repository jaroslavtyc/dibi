<?php
namespace Commands;

use Pribi\Commands\Deletions\Delete;
use Pribi\Commands\Inserts\InsertIgnoreInto;
use Pribi\Commands\Inserts\InsertInto;
use Pribi\Commands\QueryOpener;
use Pribi\Commands\Selects\Select;
use Pribi\Commands\Transactions\StartTransactions\StartTransaction;

class QueryOpenerTest extends \PHPUnit_Framework_TestCase {
	public function testQueryOpenerCanBeCreated() {
		$instance = new QueryOpener();
		$this->assertNotNull($instance);
		$this->assertEquals(QueryOpener::class, get_class($instance));
	}

	public function testQueryOpenerCanInsertInto() {
		$queryOpener = new QueryOpener();
		$queryOpener->insertInto('foo', 'bar');
	}

	public function testQueryOpenerCanReturnInsertInto() {
		$queryOpener = new QueryOpener();
		$insertInto = $queryOpener->insertInto('foo', 'bar');
		$this->assertNotNull($insertInto);
		$this->assertEquals(InsertInto::class, get_class($insertInto));
	}

	public function testQueryOpenerCanInsertIgnoreInto() {
		$queryOpener = new QueryOpener();
		$queryOpener->insertIgnoreInto('foo', 'bar');
	}

	public function testQueryOpenerCanReturnInsertIgnoreInto() {
		$queryOpener = new QueryOpener();
		$insertIgnoreInto = $queryOpener->insertIgnoreInto('foo', 'bar');
		$this->assertNotNull($insertIgnoreInto);
		$this->assertEquals(InsertIgnoreInto::class, get_class($insertIgnoreInto));
	}

	public function testQueryOpenerCanSelect() {
		$queryOpener = new QueryOpener();
		$queryOpener->select('foo');
	}

	public function testQueryOpenerCanReturnSelect() {
		$queryOpener = new QueryOpener();
		$select = $queryOpener->select('foo');
		$this->assertNotNull($select);
		$this->assertEquals(Select::class, get_class($select));
	}

	public function testQueryOpenerCanDelete() {
		$queryOpener = new QueryOpener();
		$queryOpener->delete('foo');
	}

	public function testQueryOpenerCanReturnDelete() {
		$queryOpener = new QueryOpener();
		$delete = $queryOpener->delete();
		$this->assertNotNull($delete);
		$this->assertEquals(Delete::class, get_class($delete));
	}

	public function testQueryOpenerCanStartTransaction() {
		$queryOpener = new QueryOpener();
		$queryOpener->startTransaction();
	}

	public function testQueryOpenerCanReturnStartTransaction() {
		$queryOpener = new QueryOpener();
		$startTransaction = $queryOpener->startTransaction();
		$this->assertNotNull($startTransaction);
		$this->assertEquals(StartTransaction::class, get_class($startTransaction));
	}
}
