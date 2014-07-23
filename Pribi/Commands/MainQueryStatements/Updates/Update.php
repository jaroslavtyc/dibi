<?php
namespace Pribi\Commands\MainQueryStatements\Updates;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\IdentifierBringer;

class Update extends IdentifierBringer implements Base\AfterUpdateUsable, Base\UpdateIdentifiable {
	use Base\AfterUpdating;

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',' . $this->getIdentifier()->toSql();
		} else {
			return 'UPDATE ' . $this->getIdentifier()->toSql();
		}
	}

	protected function alias(Identifier $name) {
		return new UpdateAlias($name, $this);
	}
}
