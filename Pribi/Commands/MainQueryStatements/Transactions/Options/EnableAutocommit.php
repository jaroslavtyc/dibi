<?php
namespace Pribi\Commands\MainQueryStatements\Transactions\Options;

use Pribi\Commands\WithoutIdentifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class EnableAutocommit extends WithoutIdentifier implements Executable {
	use Executabling;

	protected function toSql() {
		return 'SET autocommit = 1';
	}
}
