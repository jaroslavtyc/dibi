<?php
namespace Pribi\Commands;

use Pribi\Commands\Identifiers\Identifier,
	Pribi\Commands\Inserts\InsertIgnoreInto,
	Pribi\Commands\Inserts\InsertInto,
	Pribi\Commands\Selects\Select;

class QueryOpener extends Command {
	public function __construct() {
		parent::__construct($this);
	}

	protected function toSql() {
		return '';
	}

	public function insertInto($table, $columns) {
		return new InsertInto($table, $columns, $this);
	}

	public function insertIgnoreInto($table, $columns) {
		return new InsertIgnoreInto($table, $columns, $this);
	}

	public function select($subject) {
		return new Select(new Identifier($subject), $this);
	}

	public function delete($subject = FALSE) {
		return new Delete($subject);
	}

	public function startTransaction() {
		return new StartTransaction();
	}
}
