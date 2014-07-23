<?php
namespace Pribi\Commands\MainQueryStatements\Updates;

use Pribi\Commands\WithIdentifier;

class Set extends WithIdentifier {
	protected function toSql() {
		if (is_a($this->getPreviousCommand(), __CLASS__)) {
			return ',' . $this->getIdentifier()->toSql();
		} else {
			return 'SET ' . $this->getIdentifier()->toSql();
		}
	}

	public function equalTo($subject) {
		return new EqualTo($subject, $this);
	}
}
