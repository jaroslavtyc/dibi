<?php
namespace Pribi\Commands;

class From extends FollowingCommands {
	private $identificator;

	public function __construct($identificator, Commands $commands) {
		$this->identificator = $identificator;
		parent::__construct($commands);
	}

	public function innerJoin($identificator) {
		return parent::innerJoin($identificator);
	}

	public function leftJoin($identificator) {
		return parent::leftJoin($identificator);
	}

	public function rightJoin($identificator) {
		return parent::rightJoin($identificator);
	}

	public function where($identificator) {
		return parent::where($identificator);
	}

	public function limit($limit) {
		return parent::limit($limit);
	}

	public function offsetAndLimit($offset, $limit) {
		return parent::offsetAndLimit($offset, $limit);
	}
}