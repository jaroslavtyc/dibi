<?php
namespace Pribi\Commands\Statements\Inserts;

class InsertInto extends Insert {

	protected function toSql() {
		return 'INSERT INTO ' . parent::toSql();
	}
}