<?php
namespace Pribi\Commands\Limits\Base;

use Pribi\Commands\Limits\Limit;

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
