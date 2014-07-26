<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class InsertIgnoreInto extends Insert {

	protected function toSql() {
		return 'INSERT IGNORE INTO ' . parent::toSql();
	}
}
