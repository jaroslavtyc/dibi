<?php
namespace Pribi\Commands;

class Insert extends \Pribi\Core\Object {
	private $query;

	public function __construct(Query $query) {
		$this->query = $query;
	}

	public function addCommand(Command $command, $type) {
		if ($this->isCommandExpected[$type]) {
			$this->query->addCommand($command);
		} else {
			throw new Exceptions\UnexpectedCommand($type);
		}
	}

	protected  function isCommandExpected($type) {
		return $type === Query::INSERT_SQL
			|| $type === Query::INTO_SQL
			|| $type === Query::VALUES_SQL;
	}
}