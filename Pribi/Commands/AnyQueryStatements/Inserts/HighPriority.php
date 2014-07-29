<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class HighPriority extends \Pribi\Commands\WithoutIdentifier {

	protected function toSql() {
		return 'HIGH PRIORITY';
	}

	public function ignore() {
		return $this->getCommandBuilder()->createIgnore($this);
	}
}
 