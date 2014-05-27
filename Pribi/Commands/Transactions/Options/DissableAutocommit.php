<?php
namespace Pribi\Transactions\Options;

use Pribi\Commands\WithoutIdentifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class DisableAutocommit extends WithoutIdentifier implements Executable {
	use Executabling;

	protected function toSql() {
		return 'SET autocommit = 0';
	}
}
