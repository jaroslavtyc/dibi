<?php
namespace Pribi\Commands\AnyQueryStatements\Conditions;

class IfElse extends \Pribi\Commands\Command {

	private $condition;
	private $consequent;
	private $alternative;

	public function __construct(
		\Pribi\Commands\Identifiers\Identifier $condition,
		\Pribi\Commands\Identifiers\Identifier $consequent,
		\Pribi\Commands\Identifiers\Identifier $alternative,
		\Pribi\Commands\Command $previousCommand
	) {
		$this->condition = $condition;
		$this->consequent = $consequent;
		$this->alternative = $alternative;
		parent::__construct($previousCommand, $this->getCommandBuilder());
	}

	protected function toSql() {
		return 'IF (' . $this->condition->toSql() . ',' . $this->consequent->toSql() . ',' . $this->alternative->toSql() . ')';
	}
}
