<?php
namespace Pribi\Commands\MainQueryStatements\Transactions\Begins;

class BeginWork extends Begin {
	protected function toSql() {
		return parent::toSql() . ' WORK';
	}
}
