<?php
namespace Pribi\Commands;

/**
 * @method and($identificator) @return Command
 * @method or($identificator) @return Command
 */
trait AndOring {
	public function __call($name, $arguments) {
		$loweredName = \strtolower($name);
		if (\array_key_exists(0, $arguments)) {
			if ($loweredName === 'and') {
				$nextToFluid = $this->conjunction($arguments[0]);
			} elseif ($loweredName === 'or') {
				$nextToFluid = $this->disjunction($arguments[0]);
			} else {
				throw new Exceptions\UnexpectedCommand(\sprintf('Called [%s->%s](), expected [%s->%s]() or [%s->%s]()', get_class($this), $loweredName, get_class($this), 'and', get_class($this), 'or'));
			}
		} else {
			throw new Exceptions\MissingIdentificator;
		}

		return $nextToFluid;
	}

	/**
	 * @param $identificator
	 * @return Command
	 */
	abstract protected function conjunction($identificator);

	/**
	 * @param $identificator
	 * @return Command
	 */
	abstract protected function disjunction($identificator);
}