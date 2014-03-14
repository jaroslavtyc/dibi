<?php
namespace Pribi\Commands\Identifiers\Base {
	use Pribi\Commands\Identifiers\Exceptions;
	use Pribi\Commands\Identifiers\Identifier;

	/**
	 * @method \Pribi\Commands\Command as ($alias)
	 */
	trait Aliasing {
		public function __call($methodName, array $arguments) {
			if ($methodName === 'as') {
				if (\array_key_exists(0, $arguments)) {
					$nextToFluid = $this->alias(new Identifier($arguments[0]));
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
		abstract protected function alias(Identifier $name);
	}
}
