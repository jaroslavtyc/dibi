<?php
namespace Pribi\Commands\Updates\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Updates\Set;

trait AfterUpdating {
	public function set($subject) {
		/**
		 * @var $this \Pribi\Commands\Command
		 */
		return new Set(new Identifier($subject), $this);
	}
}
