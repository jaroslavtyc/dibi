<?php
namespace Pribi\Commands;

/**
 * @method not() @return Command
 */
trait Negating {
	public function __call($name, array $arguments) {
		$loweredName = \strtolower($name);
		if ($loweredName === 'not') {
			$nextToFluid = $this->negation($arguments[0]);
		} else {
			throw new Exceptions\UnexpectedCommand(\sprintf('Called [%s->%s](), expected [%s->%s]()', \get_class($this),
				$loweredName, \get_class($this), 'not'));
		}

		return $nextToFluid;
	}

	/**
	 * @return Command
	 */
	abstract protected function negation();
}