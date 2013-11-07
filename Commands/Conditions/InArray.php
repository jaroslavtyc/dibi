<?php
namespace Pribi\Commands;

use Pribi\Commands\UsingIdentificator;

class InArray extends UsingIdentificator {
	use AndOring;

	protected function conjunction($identificator) {
		return $this->getFollowingCommands()->conjunction($identificator);
	}

	protected function disjunction($identificator) {
		return $this->getFollowingCommands()->disjunction($identificator);
	}

	protected function negation() {
		return $this->getFollowingCommands()->negation();
	}

	public function from($identificator) {
		return $this->getFollowingCommands()->from($identificator);
	}

	public function innerJoin($identificator) {
		return $this->getFollowingCommands()->innerJoin($identificator);
	}

	public function leftJoin($identificator) {
		return $this->getFollowingCommands()->leftJoin($identificator);
	}

	public function rightJoin($identificator) {
		return $this->getFollowingCommands()->rightJoin($identificator);
	}

	public function where($identificator) {
		return $this->getFollowingCommands()->where($identificator);
	}

	public function limit($limit) {
		return $this->getFollowingCommands()->limit($limit);
	}

	public function offsetAndLimit($offset, $limit) {
		return $this->getFollowingCommands()->offsetAndLimit($offset, $limit);
	}
}