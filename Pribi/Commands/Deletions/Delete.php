<?php
namespace Pribi\Commands\Deletions;

use Pribi\Commands\FromSources\From;
use Pribi\Commands\Identifiers\EmptyIdentifier;
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

	public function delete($subject = '') {
		$this->getCommandBuilder()->createDelete(
			$subject === ''
				? new EmptyIdentifier() // that means "delete all from single table" in SQL language
				: new Identifier($subject),
			$this
		);
	}

	public function from($subject) {
		$this->getCommandBuilder()->createFrom(new Identifier($subject), $this);
	}
}
