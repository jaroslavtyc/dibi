<?php
namespace Pribi\Commands\MainQueryStatements\Transactions\Finishes;

use Pribi\Commands\WithoutIdentifier;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class AndChain extends WithoutIdentifier implements Executable {
	use Executabling;

	protected function toSql() {
		return 'AND CHAIN';
	}
}
