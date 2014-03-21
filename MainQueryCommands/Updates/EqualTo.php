<?php
namespace Pribi\MainQueryCommands\Updates;

use Pribi\Commands\Limits\Base\Limitable;
use Pribi\MainQueryCommands\Limits\Base\Limiting;
use Pribi\Commands\WithIdentifier;
use Pribi\MainQueryCommands\WhereSources\Base\Whereable;
use Pribi\MainQueryCommands\WhereSources\Base\Whereing;
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
