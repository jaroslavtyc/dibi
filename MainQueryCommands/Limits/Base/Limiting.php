<?php
namespace Pribi\MainQueryCommands\Limits\Base;

use Pribi\MainQueryCommands\Limits\Limit;

trait Limiting {
	public function limit($limit) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new Limit(0, $limit, $this);
	}

	public function offsetAndLimit($offset, $limit) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new Limit($offset, $limit, $this);
	}
}
