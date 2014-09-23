<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Parts;

use Pribi\Commands\AnyQueryStatements\Conditions\DifferentTo;
use Pribi\Commands\AnyQueryStatements\Conditions\EqualOrGreaterThen;
use Pribi\Commands\AnyQueryStatements\Conditions\EqualOrLesserThen;
use Pribi\Commands\AnyQueryStatements\Conditions\EqualTo;
use Pribi\Commands\AnyQueryStatements\Conditions\GreaterThen;
use Pribi\Commands\AnyQueryStatements\Conditions\LesserThen;
use Pribi\Commands\Identifiers\Identifier;

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
