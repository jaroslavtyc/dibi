<?php
namespace Pribi\Commands\MainQueryStatements\WhereConditions\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\MainQueryStatements\WhereConditions\Where;
use Pribi\Commands\MainQueryStatements\WhereConditions\WhereNot;

trait Whereing {
	public function where($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new Where(new Identifier($subject), $this);
	}

	public function whereNot($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new WhereNot(new Identifier($subject), $this);
	}
}
