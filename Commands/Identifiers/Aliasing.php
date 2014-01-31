<?php
namespace Pribi\Commands\Identifiers {
	/**
	 * @method Command as ($alias)
	 */
	trait Aliasing {
		public function __call($methodName, $arguments) {
			if ($methodName === 'as') {
				if (\array_key_exists(0, $arguments)) {
					$nextToFluid = $this->alias(new Identifier($arguments[0]));
				} else {
					throw new Exceptions\MissingAliasName;
				}
			} else {
				throw new Exceptions\ExpectedAlias(\sprintf('Expected as(), but called [%s->%s]()', get_class($this), $methodName));
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
