<?php
namespace Pribi\Commands\FromSources;

use Pribi\Commands\Conditions\Limiting;
use Pribi\Commands\Conditions\Where;
use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Identifiers\IdentifierBringer;
use Pribi\Executions\Executabling;
use Pribi\Commands\Joins\InnerJoin;
use Pribi\Commands\Joins\LeftJoin;
use Pribi\Commands\Joins\RightJoin;

/**
 * @method \Pribi\Commands\FromSources\FromAlias as ($alias)
 */
class From extends IdentifierBringer implements FromIdentity {
	use Limiting;
	use Executabling;

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), self::CLASS_IDENTITY)) {
			return ',' . $this->getIdentifier()->toSql();
		} else {
			return 'FROM ' . $this->getIdentifier()->toSql();
		}
	}

	protected function alias(Identifier $alias) {
		return new FromAlias($alias, $this);
	}

	public function innerJoin($subject) {
		return new InnerJoin(new Identifier($subject), $this);
	}

	public function leftJoin($subject) {
		return new LeftJoin(new Identifier($subject), $this);
	}

	public function rightJoin($subject) {
		return new RightJoin(new Identifier($subject), $this);
	}

	public function where($subject) {
		return new Where(new Identifier($subject), $this);
	}
}
