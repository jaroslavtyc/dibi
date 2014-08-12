<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class Into extends \Pribi\Commands\WithIdentifier {

	/**
	 * @var \Pribi\Commands\Identifiers\Identifiers
	 */
	private $columnIdentifiers;

	public function __construct(
		\Pribi\Commands\Identifiers\Identifier $tableIdentifier,
		\Pribi\Commands\Identifiers\Identifiers $columnIdentifiers,
		\Pribi\Commands\Command $previousCommand,
		\Pribi\Builders\CommandsBuilder $commandsBuilder
	) {
		parent::__construct($tableIdentifier, $this, $commandsBuilder);
		$this->columnIdentifiers = $columnIdentifiers;
	}

	protected function toSql() {
		return
			'INTO ' . $this->getIdentifier()->toSql()
			. ($this->columnIdentifiers->count() > 0
				? '(' . $this->columnIdentifiers->toSql() . ')'
				: ''
			);
	}

	public function values(array $values) {
		return $this->getCommandBuilder()->createValues($this->getCommandBuilder()->createSubjects($values), $this);
	}

	public function set() {

	}

	public function select() {

	}

}
