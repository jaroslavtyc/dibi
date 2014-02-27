<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\Command;
use Pribi\Commands\Identifiers\Subjects;

class Values extends Command {
	private $values;

	public function __construct(Subjects $values, Command $previousCommand) {
		parent::__construct($previousCommand);
		$this->values = $values;
	}

	protected function toSql() {
		return 'VALUES (' . $this->values->toSql() . ')';
	}
}
