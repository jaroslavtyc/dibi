<?php
namespace Pribi\Commands\Inserts;

class InsertInto extends Insert {
	protected function toSql() {
		return 'INSERT' . $this->getSqlWithoutInsertCommand();
	}
}
