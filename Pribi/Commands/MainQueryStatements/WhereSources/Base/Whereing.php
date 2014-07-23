<?php
namespace Pribi\Commands\MainQueryStatements\WhereSources\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\MainQueryStatements\WhereSources\Where;
use Pribi\Commands\MainQueryStatements\WhereSources\WhereNot;

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
