<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class Delayed extends \Pribi\Commands\WithoutIdentifier {

	protected function toSql() {
		return 'DELAYED';
	}

	public function ignore() {
		return $this->getCommandBuilder()->createIgnore($this);
	}
}
 