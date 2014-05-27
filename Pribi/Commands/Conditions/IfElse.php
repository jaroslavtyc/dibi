<?php
namespace Pribi\Commands\Conditions;

use Pribi\Commands\Command;
use Pribi\Commands\Identifiers\Identifier;

class IfElse extends Command {
	private $condition;
	private $consequent;
	private $alternative;

	public function __construct(
		Identifier $condition,
		Identifier $consequent,
		Identifier $alternative,
		Command $previousCommand
	) {
		$this->condition = $condition;
		$this->consequent = $consequent;
		$this->alternative = $alternative;
		parent::__construct($previousCommand);
	}

	protected function toSql() {
		return 'IF (' . $this->condition->toSql() . ',' . $this->consequent->toSql() . ',' . $this->alternative->toSql() . ')';
	}
}
