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

	/**
	 * @param $identifier
	 * @return Conjunction
	 */
	abstract protected function conjunction(Identifier $identifier);

	/**
	 * @param $identifier
	 * @return Disjunction
	 */
	abstract protected function disjunction(Identifier $identifier);
}
