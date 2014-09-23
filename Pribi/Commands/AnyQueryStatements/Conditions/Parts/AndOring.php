<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Parts;

use Pribi\Commands\AnyQueryStatements\Conditions\AndNot;
use Pribi\Commands\AnyQueryStatements\Conditions\Disjunction;
use Pribi\Commands\AnyQueryStatements\Conditions\Exceptions;
use Pribi\Commands\AnyQueryStatements\Conditions\OrNot;
use Pribi\Commands\Identifiers\Identifier;

/**
 * @method \Pribi\Commands\Command and($identificator)
 * @method \Pribi\Commands\Command or($identificator)
 */
trait AndOring {

	/**
	 * @param $name
	 * @param array $arguments
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\Conjunction|Disjunction
	 * @throws \Pribi\Commands\AnyQueryStatements\Conditions\Exceptions\UnknownMethodCalled
	 */
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
	 * @param Identifier $identifier
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\Conjunction
	 */
	protected function conjunction(Identifier $identifier) {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createAnyQueryConjunction($identifier, $this);
	}

	/**
	 * @param Identifier $identifier
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\Disjunction
	 */
	protected function disjunction(Identifier $identifier) {
		/** @var \Pribi\Commands\Command $this */
		return $this->getCommandBuilder()->createAnyQueryDisjunction($identifier, $this);
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
