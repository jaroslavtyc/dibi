<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class LowPriority extends \Pribi\Commands\WithoutIdentifier {

	protected function toSql() {
		return 'LOW PRIORITY';
	}

	public function ignore() {
		return $this->getCommandBuilder()->createIgnore($this);
	}
}
 