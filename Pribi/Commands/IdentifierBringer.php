<?php
namespace Pribi\Commands;

/**
 * Class IdentifierBringer
 * @package Pribi\Commands
 *
 * Includes an identifier to query, so has the possibility to rename it immediately by an alias
 *
 * @method \Pribi\Commands\Identifiers\IdentifierAlias as ($alias)
 */

abstract class IdentifierBringer extends WithIdentifier {
	public function __call($methodName, array $arguments) {
		if ($methodName === 'as') {
			if (\array_key_exists(0, $arguments)) {
				$nextToFluid = $this->alias(new \Pribi\Commands\Identifiers\Identifier($arguments[0]));
			} else {
				throw new Exceptions\MissingAliasName;
			}
		} else {
			throw new Exceptions\UnknownMethodCalled(\sprintf('Called non-existing method [%s->%s()]', get_class($this), $methodName));
		}

		return $nextToFluid;
	}

	/**
	 * @param $name
	 * @return \Pribi\Commands\Command
	 */
	abstract protected function alias(\Pribi\Commands\Identifiers\Identifier $name);
}
