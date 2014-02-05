<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class Negation extends WithIdentifier {
	protected function toSql() {
		return 'NOT ' . $this->getIdentifier()->toSql();
	}

	public function in($firstSubject) {
		$in = new In($firstSubject);

		return $in;
	}

	public function like($subject) {
		$like = new Like($subject);

		return $like;
	}
}
