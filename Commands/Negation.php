<?php
namespace Pribi\Commands;

class Negation extends CommandWithoutIdentificator {
	public function in($firstIdentificator) {
		return $this->getFollowingCommands()->in($firstIdentificator);
	}

	public function inArray(array $identificators) {
		return $this->getFollowingCommands()->inArray($identificators);
	}
}