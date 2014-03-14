<?php
namespace Pribi\Commands\Joins\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Joins\DifferentTo;
use Pribi\Commands\Joins\EqualOrGreaterThen;
use Pribi\Commands\Joins\EqualOrLesserThen;
use Pribi\Commands\Joins\EqualTo;
use Pribi\Commands\Joins\GreaterThen;
use Pribi\Commands\Joins\LesserThen;

trait Comparing {
	public function equalTo($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new EqualTo(new Identifier($subject), $this);
	}

	public function equalOrGreaterThen($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new EqualOrGreaterThen(new Identifier($subject), $this);
	}

	public function equalOrLesserThen($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new EqualOrLesserThen(new Identifier($subject), $this);
	}

	public function greaterThen($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new GreaterThen(new Identifier($subject), $this);
	}

	public function lesserThen($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new LesserThen(new Identifier($subject), $this);
	}

	public function differentTo($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new DifferentTo(new Identifier($subject), $this);
	}
}
 