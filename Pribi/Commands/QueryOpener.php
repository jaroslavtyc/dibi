<?php
namespace Pribi\Commands;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Inserts\InsertIgnoreInto;
use Pribi\Commands\Inserts\InsertInto;
use Pribi\Commands\Selects\Select;
use Pribi\Commands\Identifiers\Identifiers;
use Pribi\Commands\Transactions\StartTransactions\StartTransaction;

class QueryOpener extends Command {
	public function __construct() {
		parent::__construct($this);
	}

	protected function toSql() {
		return '';
	}

	public function insertInto($table, $columns) {
		return new InsertInto(new Identifier($table), $this, new Identifiers($columns));
	}

	public function insertIgnoreInto($table, $columns) {
		return new InsertIgnoreInto(new Identifier($table), $this, new Identifiers($columns));
	}

	public function select($subject) {
		return new Select(new Identifier($subject), $this);
	}

	public function delete($subject = FALSE) {
		return new Delete($subject);
	}

	public function startTransaction() {
		return new StartTransaction($this);
	}
}
