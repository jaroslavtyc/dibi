<?php
namespace Pribi\Commands\FromSources;

use Pribi\Commands\IdentifierAlias;
use Pribi\Commands\Joins\InnerJoin;
use Pribi\Commands\Joins\LeftJoin;
use Pribi\Commands\Joins\RightJoin;
use Pribi\Commands\Where;
use Pribi\Commands\Limit;

class FromAlias extends IdentifierAlias {
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
