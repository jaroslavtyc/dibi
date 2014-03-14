<?php
namespace Pribi\Commands\Joins\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\Commands\Joins\AndNot;
use Pribi\Commands\Joins\Conjunction;
use Pribi\Commands\Joins\Disjunction;
use Pribi\Commands\Joins\OrNot;

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
