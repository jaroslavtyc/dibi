<?php
namespace Pribi\MainQueryCommands\Conditions\Base;

use Pribi\Commands\Identifiers\Identifier;
use Pribi\MainQueryCommands\Conditions\AndNot;
use Pribi\MainQueryCommands\Conditions\Conjunction;
use Pribi\MainQueryCommands\Conditions\Disjunction;
use Pribi\MainQueryCommands\Conditions\Exceptions;
use Pribi\MainQueryCommands\Conditions\OrNot;

/**
 * @method \Pribi\Commands\Command and($identificator)
 * @method \Pribi\Commands\Command or($identificator)
 */
trait AndOring {
	public function __call($name, array $arguments) {
		$upperCasedName = \strtoupper($name);
		if ($upperCasedName === 'AND') {
			return $this->conjunction(new Identifier($arguments[0]));
		} elseif ($upperCasedName === 'OR') {
			return $this->disjunction(new Identifier($arguments[0]));
		} else {
			throw new Exceptions\UnknownMethodCalled(\sprintf('Called non-existing method [%s->%s()]', get_class($this), $name));
		}
	}

	protected function conjunction(Identifier $identifier) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new Conjunction($identifier, $this);
	}

	protected function disjunction(Identifier $identifier) {
		/**
		 * @var \Pribi\Commands\Command $this
		 */
		return new Disjunction($identifier, $this);
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
