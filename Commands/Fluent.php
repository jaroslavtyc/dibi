<?php
namespace Pribi\Commands;

use Pribi\Commands\Inserts\InsertInto;
use Pribi\Commands\Inserts\InsertIgnoreInto;
use Pribi\Commands\Selects\Select;
use Pribi\Commands\Transactions\StartTransactions\StartTransaction;

class Fluent extends Command {
	public function __construct() {

	}

	protected function toSql() {
		return '';
	}

	public function insertInto($columns) {
		return new InsertInto($this, $columns);
	}

	public function insertIgnoreInto() {
		return new InsertIgnoreInto($this);
	}

	public function select($subject) {
		return new Select($subject);
	}

	public function delete($subject = FALSE) {
		return new Delete($subject);
	}

	public function startTransaction() {
		return new StartTransaction();
	}
}
