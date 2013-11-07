<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\IdentifierBringer;
use Pribi\Commands\Joins\InnerJoin;
use Pribi\Commands\Joins\LeftJoin;
use Pribi\Commands\Joins\RightJoin;

/**
 * @method \Pribi\Commands\Joins\AliasedInnerJoin as ($alias)
 */
abstract class Join extends IdentifierBringer {
	public function on($identificator) {
		return new On($identificator, $this);
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
