<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Command;

trait Limiting {
	public function limit($limit) {
		/**
		 * @var Command $this
		 */
		return new Limit(0, $limit, $this);
	}

	public function offsetAndLimit($offset, $limit) {
		/**
		 * @var Command $this
		 */
		return new Limit($offset, $limit, $this);
	}
}
