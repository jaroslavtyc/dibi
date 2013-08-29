<?php
namespace Pribi\Commands {
	/**
	 * @method as ($alias) @return Command
	 */
	trait Aliasing {
		public function __call($name, array $arguments) {
			$loweredName = \strtolower($name);
			if ($loweredName === 'as') {
				if (\array_key_exists(0, $arguments)) {
					$nextToFluid = $this->alias($arguments[0]);
				} else {
					throw new Exceptions\MissingAliasName;
				}
			} else {
				throw new Exceptions\ExpectedAlias(\sprintf('Called [%s->%s]()', get_class($this), $loweredName));
			}

			return $nextToFluid;
		}

		/**
		 * @param $name
		 * @return Command
		 */
		abstract protected function alias($name);
	}
}