<?php
namespace Pribi\MainQueryCommands\WhereSources\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\MainQueryCommands\WhereSources\Where;
use Pribi\MainQueryCommands\WhereSources\WhereNot;

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
