<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions\Parts;

/**
 * @method \Pribi\Commands\Command and($subject)
 * @method \Pribi\Commands\Command or($subject)
 */
trait AndOring {

	/**
	 * @param $name
	 * @param array $arguments
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\Conjunction|\Pribi\Commands\AnyQueryStatements\Conditions\Disjunction
	 * @throws \Pribi\Commands\AnyQueryStatements\Conditions\Exceptions\UnknownMethodCalled
	 */
	public function __call($name, array $arguments) {
		$upperCasedName = \strtoupper($name);
		if ($upperCasedName === 'AND') {
			/** @var \Pribi\Commands\Command $this */
			$identifier = $this->getCommandBuilder()->createIdentifier($arguments[0]);
			/** @var $this */
			return $this->conjunction($identifier);
		} elseif ($upperCasedName === 'OR') {
			/** @var \Pribi\Commands\Command $this */
			$identifier = $this->getCommandBuilder()->createIdentifier($arguments[0]);
			/** @var $this */
			return $this->disjunction($identifier);
		} else {
			throw new \Pribi\Commands\AnyQueryStatements\Conditions\Exceptions\UnknownMethodCalled(
				\sprintf('Called non-existing method [%s->%s()]', get_class($this), $name)
			);
		}
	}

	/**
	 * @param \Pribi\Commands\Identifiers\Identifier $identifier
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\Conjunction
	 */
	abstract protected function conjunction(\Pribi\Commands\Identifiers\Identifier $identifier);

	/**
	 * @param \Pribi\Commands\Identifiers\Identifier $identifier
	 * @return \Pribi\Commands\AnyQueryStatements\Conditions\Disjunction
	 */
	abstract protected function disjunction(\Pribi\Commands\Identifiers\Identifier $identifier);
}
