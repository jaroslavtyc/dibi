<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

use Pribi\Commands\Command;
use Pribi\Commands\Identifiers\Identifiers;

class Values extends Command {
	private $values;

	public function __construct(Identifiers $values, Command $previousCommand) {
		parent::__construct($previousCommand);
		$this->values = $values;
	}

	protected function toSql() {
		return 'VALUES (' . $this->values->toSql() . ')';
	}
}
