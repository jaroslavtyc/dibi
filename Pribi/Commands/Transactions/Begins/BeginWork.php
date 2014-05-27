<?php
namespace Pribi\Commands\Transactions\Begins;

class BeginWork extends Begin {
	protected function toSql() {
		return 'BEGIN WORK';
	}
}
