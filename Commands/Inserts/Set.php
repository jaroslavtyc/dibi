<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\Command;

class Set extends Command {
	private $values;

	public function __construct($values, Command $previousCommand) {
		$this->values = $values;
		parent::__construct($previousCommand);
	}

	public function onDuplicateKeyUpdate($expression) {
		return new OnDuplicateKeyUpdate($expression, $this);
	}
}
