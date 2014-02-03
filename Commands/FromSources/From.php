<?php
namespace Pribi\Commands\FromSources;

use Pribi\Commands\IdentifierBringer,
	Pribi\Commands\InnerJoin,
	Pribi\Commands\LeftJoin,
	Pribi\Commands\RightJoin,
	Pribi\Commands\Where,
	Pribi\Commands\Limit;

/**
 * @method \Pribi\Commands\FromSources\FromAlias as ($alias)
 */
class From extends IdentifierBringer {
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
