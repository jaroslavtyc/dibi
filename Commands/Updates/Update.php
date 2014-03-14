<?php
namespace Pribi\Commands\Updates;

use Pribi\Commands\Identifiers\Base\Aliasing;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\IdentifierBringer;
use Pribi\Commands\Updates\Base\AfterUpdating;

class Update extends IdentifierBringer implements Base\AfterUpdateUsable, Base\UpdateIdentifiable {
	use AfterUpdating;

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
