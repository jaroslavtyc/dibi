<?php
namespace Pribi\MainQueryCommands\Updates\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\MainQueryCommands\Updates\Set;

trait AfterUpdating {
	public function set($subject) {
		/**
		 * @var $this \Pribi\Commands\Command
		 */
		return new Set(new Identifier($subject), $this);
	}
}
