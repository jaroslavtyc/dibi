<?php
namespace Pribi\Commands\Inserts;

use Pribi\Commands\Command;

class OnDuplicateKeyUpdate extends Command {
	private $expression;

	public function __construct($expression, Command $previousCommand) {
		$this->expression = $expression;
		parent::__construct($previousCommand);
	}
}
