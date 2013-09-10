<?php
namespace Pribi\Commands\FromSources;

use Pribi\Commands\IdentificatorBringer;
use Pribi\Commands\InnerJoin;
use Pribi\Commands\LeftJoin;
use Pribi\Commands\RightJoin;
use Pribi\Commands\Where;
use Pribi\Commands\Limit;

/**
 * @method FromAlias as($alias)
 */
class From extends IdentificatorBringer {
	protected function alias($alias) {
		return new FromAlias($alias, $this);
	}

	public function innerJoin($identificator) {
		return new InnerJoin($identificator, $this);
	}

	public function leftJoin($identificator) {
		return new LeftJoin($identificator, $this);
	}

	public function rightJoin($identificator) {
		return new RightJoin($identificator, $this);
	}

	public function where($identificator) {
		return new Where($identificator, $this);
	}

	public function limit($limit) {
		return new Limit(0, $limit);
	}

	public function offsetLimit($offset, $limit) {
		return new Limit($offset, $limit);
	}
}
