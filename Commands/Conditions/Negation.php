<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithoutIdentificator;

abstract class Negation extends WithoutIdentificator {
	use Negating;

	public function in($firstSubject) {
		$in = new In($firstSubject);

		return $in;
	}

	public function like($subject) {
		$like = new Like($subject);

		return $like;
	}
}
