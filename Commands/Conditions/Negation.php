<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithoutIdentifier;

abstract class Negation extends WithoutIdentifier {
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
