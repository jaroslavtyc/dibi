<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\Executable;
use Pribi\Commands\Executabling;
use Pribi\Commands\Command;

class Values extends Command implements Executable {
	use Executabling;

	private $values;

	public function __construct($values, Command $previousCommand) {
		parent::__construct($previousCommand);
		$this->values = $this->toTraversable($values);
	}

	private function toTraversable($values) {
	}

	public function onDuplicateKeyUpdate($expression) {
		return new OnDuplicateKeyUpdate($expression, $this);
	}
}
