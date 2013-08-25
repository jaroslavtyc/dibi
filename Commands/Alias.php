<?php
namespace Pribi\Commands {

	/**
	 * @method as($alias)
	 */
	trait Alias {
		use FluentProvider;

		public function __call($name, array $arguments) {
			$loweredName = \strtolower($name);
			if ($loweredName === 'as') {
				$this->alias($arguments[0]);
			} else {
				throw new Exceptions\ExpectedAlias(\sprintf('Called [%s->%s]()', get_class($this), $loweredName));
			}

			return $this->getNextToFluid();
		}

		abstract protected function alias($name);
	}
}