<?php
namespace Pribi\Commands {
	/**
	 * @method Command as($alias)
	 */
	trait Aliasing {
		public function __call($name, $arguments) {
			$loweredName = \strtolower($name);
			if ($loweredName === 'as') {
				if (\array_key_exists(0, $arguments)) {
					$nextToFluid = $this->alias($arguments[0]);
				} else {
					throw new Exceptions\MissingAliasName;
				}
			} else {
				throw new Exceptions\ExpectedAlias(\sprintf('But called [%s->%s]()', get_class($this), $loweredName));
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
