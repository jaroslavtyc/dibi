<?php
namespace Pribi\Commands;

use Pribi\Commands\Selects\Select;
use Pribi\Commands\Transactions\Begins\Begin;
use Pribi\Commands\Transactions\BeginWorks\BeginWork;
use Pribi\Commands\Transactions\StartTransactions\StartTransaction;
use Pribi\Core\Object;

class Fluent extends Object implements Command {
	public function insert() {
		return new Insert();
	}

	public function select($subject) {
		return new Select($subject);
	}

	public function delete($subject = FALSE) {
		return new Delete($subject);
	}

	public function begin() {
		return new Begin();
	}

	public function beginWork() {
		return new BeginWork();
	}

	public function startTransaction() {
		return new StartTransaction();
	}
}
