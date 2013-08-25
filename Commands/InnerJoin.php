<?php
namespace Pribi\Commands;

class InnerJoin extends FollowingCommands {
	private $identificator;

	public function __construct($identificator, Commands $commands) {
		$this->identificator = $identificator;
		parent::__construct($commands);
	}

	public function on($identificator) {
		return parent::on($identificator);
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