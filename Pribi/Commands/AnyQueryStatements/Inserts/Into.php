<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class Into extends \Pribi\Commands\WithIdentifier {

	/**
	 * @var \Pribi\Commands\Identifiers\Identifiers
	 */
	private $columnNames;

	public function __construct(
		\Pribi\Commands\Identifiers\Identifier $tableName,
		\Pribi\Commands\Identifiers\Identifiers $columnNames,
		\Pribi\Commands\Command $previousCommand,
		\Pribi\Builders\CommandsBuilder $commandsBuilder
	) {
		parent::__construct($tableName, $this, $commandsBuilder);
		$this->columnNames = $columnNames;
	}

	protected function toSql() {
		return
			'INTO ' . $this->getIdentifier()->toSql()
			. ($this->columnNames->count() > 0
				? '(' . $this->columnNames->toSql() . ')'
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
