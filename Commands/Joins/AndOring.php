<?php
namespace Pribi\Commands\Joins;

use Pribi\Commands\Identifiers\Identifier;

/**
 * @method Conjunction and($subject)
 * @method Disjunction or($subject)
 */
trait AndOring {
	use \Pribi\Commands\Conditions\Base\AndOring;

	protected function conjunction(Identifier $identifier) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$conjunction = new Conjunction($identifier, $this);

		return $conjunction;
	}

	protected function disjunction(Identifier $identifier) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		$disjunction = new Disjunction($identifier, $this);

		return $disjunction;
	}

	public function andNot($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new AndNot(new Identifier($subject), $this);
	}

	public function orNot($subject) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new OrNot(new Identifier($subject), $this);
	}
}
