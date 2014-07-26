<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class InsertInto extends Insert {

	protected function toSql() {
		return 'INSERT INTO ' . parent::toSql();
	}
}
