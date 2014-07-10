<?php
namespace Pribi\Commands\Subconditions;

use Pribi\Builders\CommandsBuilder;
use Pribi\Commands\Command;

class Subcondition extends Command {
	public function __construct(CommandsBuilder $commandsBuilder) {
		parent::__construct($this, $commandsBuilder);
	}

	protected function toSql() {
		return '';
	}

	public function subject($subject) {
		return new Subject($subject);
	}

	public function select($subject) {
		return new Select($subject);
	}

	public function delete($subject = FALSE) {
		return new Delete($subject);
	}

	public function startTransaction() {
		return new StartTransaction();
	}
}
