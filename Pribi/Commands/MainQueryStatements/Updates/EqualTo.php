<?php
namespace Pribi\Commands\MainQueryStatements\Updates;

use Pribi\Commands\Statements\Limits\Base\Limitable;
use Pribi\Commands\MainQueryStatements\Limits\Base\Limiting;
use Pribi\Commands\WithIdentifier;
use Pribi\Commands\MainQueryStatements\WhereSources\Base\Whereable;
use Pribi\Commands\MainQueryStatements\WhereSources\Base\Whereing;
use Pribi\Executions\Executable;
use Pribi\Executions\Executabling;

class EqualTo extends WithIdentifier implements Whereable, Limitable, Executable {
	use Whereing;
	use Limiting;
	use Executabling;

	protected function toSql() {
		return '= ' . $this->getIdentifier()->toSql();
	}
}
