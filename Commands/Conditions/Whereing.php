<?php
namespace Pribi\Commands\Conditions;

trait Whereing {
	public function where($identificator) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new Where($identificator, $this);
	}

	public function whereNot($identificator) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new WhereNot($identificator, $this);
	}
}
 