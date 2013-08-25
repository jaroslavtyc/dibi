<?php
namespace Pribi\Commands;

class Query extends \Pribi\Core\Object {


	private $commands = array(
		self::SELECT_SQL => array(),
		self::INSERT_SQL => array(),
		self::UPDATE_SQL => array(),
		self::DELETE_SQL => array(),
		self::INTO_SQL => array(),
		self::FROM_SQL => array(),
		self::INNER_JOIN_SQL => array(),
		self::LEFT_JOIN_SQL => array(),
		self::RIGHT_JOIN_SQL => array(),
		self::WHERE_SQL => array(),
	);

	public function addCommand(Command $command, $type) {
		if (!isset($this->commands[$type])) {
			$this->commands[$type] = array();
		}

		$this->commands[$type][] = $command;
	}

	public function getPreparedQuery() {
	}
}
