<?php
namespace Pribi\Commands\Transactions;
use \Pribi\Core\Object;

abstract class Command extends Object implements \Pribi\Commands\Command {
	private $previousCommand;

	public function __construct(Command $previousCommand = NULL) {
		$this->previousCommand = $previousCommand;
	}
}
