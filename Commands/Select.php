<?php
namespace Pribi\Commands;

class Select extends CommandWithIdentificator {
	public function select($identificator) {
		return $this->getFollowingCommands()->select($identificator);
	}

	public function from($identificator) {
		return $this->getFollowingCommands()->from($identificator);
	}

	public function where($identificator) {
		return $this->getFollowingCommands()->where($identificator);
	}

	public function limit($limit) {
		return $this->getFollowingCommands()->limit($limit);
	}

	public function offsetAndLimit($offset, $limit) {
		return $this->getFollowingCommands()->limit($offset, $limit);
	}
}