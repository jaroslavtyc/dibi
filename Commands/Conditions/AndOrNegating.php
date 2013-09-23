<?php
namespace Pribi\Commands\Conditions;

/**
 * @method FollowingCommand and($identificator)
 * @method FollowingCommand or($identificator)
 */
trait AndOrNegating {
	public function __call($name, array $arguments) {
		$loweredName = \strtolower($name);
		if ($loweredName === 'not') {
			$nextToFluid = $this->negation($arguments[0]);
		} elseif (\array_key_exists(0, $arguments)) {
			if ($loweredName === 'and') {
				$nextToFluid = $this->conjunction($arguments[0]);
			} elseif ($loweredName === 'or') {
				$nextToFluid = $this->disjunction($arguments[0]);
			} else {
				throw new Exceptions\UnexpectedCommand(\sprintf('Called [%s->%s](), expected [%s->%s]() or [%s->%s]()', get_class($this), $loweredName, get_class($this), 'and', get_class($this), 'or'));
			}
		} else {
			throw new Exceptions\UnknownCommand($name);
		}

		return $nextToFluid;
	}

	/**
	 * @param $identificator
	 * @return FollowingCommand
	 */
	abstract protected function conjunction($identificator);

	/**
	 * @param $identificator
	 * @return FollowingCommand
	 */
	abstract protected function disjunction($identificator);

	/**
	 * @return FollowingCommand
	 */
	abstract protected function negation();
}
