<?php
namespace Pribi\Commands\MainQueryStatements\Transactions\Options;

class DisableAutocommit extends \Pribi\Commands\WithoutIdentifier implements \Pribi\Executions\Executable {
	use \Pribi\Executions\Executabling;

	protected function toSql() {
		return 'SET autocommit = 0';
	}
}
