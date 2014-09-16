<?php
namespace Pribi\Commands\Deletions;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\WithIdentifier;

class Delete extends WithIdentifier {
	const CLASS_IDENTITY = __CLASS__;

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',' . $this->getIdentifier()->toSql();
		} else {
			return 'DELETE ' . $this->getIdentifier()->toSql();
		}
	}

	public function delete($subject = '' /* that means "delete all from single table" in SQL language */) {
		$this->getCommandBuilder()->createDelete(new Identifier($subject), $this);
	}

	public function from($subject) {
		$this->getCommandBuilder()->createAnyQueryFrom(new Identifier($subject), $this);
	}
}
