<?php
namespace Pribi\Commands\Subconditions;

use Pribi\Commands\Conditions\Base\AndOring;

/**
 * @method and($identificator) @return Conjunction
 * @method or($identificator) @return Disjunction
 */
class Subject extends UsingIdentificator {
	use \Pribi\Commands\Conditions\Base\AndOring;

	protected function conjunction($subject) {
		return new Conjunction($subject, $this);
	}

	protected function disjunction($subject) {
		return new Disjunction($subject, $this);
	}

	public function isNull() {
		return new IsNull($this);
	}

	public function isNotNull() {
		return new IsNotNull($this);
	}
}
