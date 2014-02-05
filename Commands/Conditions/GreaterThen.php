<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\WithIdentifier;

class GreaterThen extends WithIdentifier {
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

	protected function toSql() {
		return '> ' . $this->getIdentifier()->toSql();
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