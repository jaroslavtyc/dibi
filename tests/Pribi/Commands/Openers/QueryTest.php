<?php
namespace Commands;

use Pribi\Commands\Deletions\Delete;
use Pribi\Commands\Inserts\InsertIgnoreInto;
use Pribi\Commands\Inserts\InsertInto;
use Pribi\Commands\Openers\Query;
use Pribi\Commands\Selects\Select;
use Pribi\Commands\Transactions\StartTransactions\StartTransaction;

class QueryTest extends \PHPUnit_Framework_TestCase {
	public function testQueryOpenerCanBeCreated() {
		$instance = new Query();
		$this->assertNotNull($instance);
		$this->assertEquals(Query::class, get_class($instance));
	}

	public function testQueryOpenerCanInsertInto() {
		$queryOpener = new Query();
		$queryOpener->insertInto('foo', 'bar');
	}

	public function testQueryOpenerCanReturnInsertInto() {
		$queryOpener = new Query();
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
