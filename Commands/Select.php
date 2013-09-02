<?php
namespace Pribi\Commands;

/**
 * @method \Pribi\Commands\Select as($alias)
 */
class Select extends CommandBringingIdentificator {
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