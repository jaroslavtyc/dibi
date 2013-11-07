<?php
namespace Pribi\Commands;

use Pribi\Core\Object;

abstract class Command extends Object {
	private $previousCommand;

	public function __construct(Command $previousCommand) {
		$this->previousCommand = $previousCommand;
	}

	abstract protected function toSql();

	protected function hasPreviousCommand() {
		return isset($this->previousCommand);
	}

	/**
	 * @return Command
	 */
	protected function getPreviousCommand() {
		return $this->previousCommand;
	}
}
