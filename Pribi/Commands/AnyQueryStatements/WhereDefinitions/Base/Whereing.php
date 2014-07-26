<?php
namespace Pribi\Commands\WhereDefinitions\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\WhereDefinitions\Where;
use Pribi\Commands\WhereDefinitions\WhereNot;

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
