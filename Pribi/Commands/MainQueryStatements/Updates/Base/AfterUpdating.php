<?php
namespace Pribi\Commands\MainQueryStatements\Updates\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\MainQueryStatements\Updates\Set;

trait AfterUpdating {
	public function set($subject) {
		/**
		 * @var $this \Pribi\Commands\Command
		 */
		return new Set(new Identifier($subject), $this);
	}
}
