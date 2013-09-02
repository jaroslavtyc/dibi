<?php
namespace Pribi\Commands;
/**
 * @method \Pribi\Commands\From as($alias)
 */
class From extends CommandBringingIdentificator {
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