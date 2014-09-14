<?php
namespace Pribi\Commands\AnyQueryStatements\Joins;

use Pribi\Commands\Identifiers\Identifier;

trait Joining {
	public function innerJoin($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new InnerJoin(new Identifier($subject), $this);
	}

	public function leftJoin($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new LeftJoin(new Identifier($subject), $this);
	}

	public function rightJoin($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new RightJoin(new Identifier($subject), $this);
	}
}
