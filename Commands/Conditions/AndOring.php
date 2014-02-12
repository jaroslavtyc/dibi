<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Command;
use Pribi\Commands\Identifiers\Identifier;

/**
 * @method Command and($identificator)
 * @method Command or($identificator)
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
		 * @var Command $this
		 */
		return new Conjunction($identifier, $this);
	}

	protected function disjunction(Identifier $identifier) {
		/**
		 * @var Command $this
		 */
		return new Disjunction($identifier, $this);
	}
}
