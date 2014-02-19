<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Identifiers\Identifier;

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
 