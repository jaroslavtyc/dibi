<?php
namespace Pribi\Commands\Statements\Inserts;

class InsertIgnoreInto extends Insert {

	protected function toSql() {
		return 'INSERT IGNORE INTO ' . parent::toSql();
	}
}
