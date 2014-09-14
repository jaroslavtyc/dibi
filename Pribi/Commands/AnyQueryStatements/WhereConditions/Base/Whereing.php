<?php
namespace Pribi\Commands\AnyQueryStatements\WhereConditions\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\AnyQueryStatements\WhereConditions\Where;
use Pribi\Commands\AnyQueryStatements\WhereConditions\WhereNot;

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
