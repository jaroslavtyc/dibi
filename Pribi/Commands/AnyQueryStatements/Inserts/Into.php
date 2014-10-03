<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class Into extends \Pribi\Commands\WithIdentifier {

	/**
	 * @var \Pribi\Commands\Identifiers\Identifiers
	 */
	private $columnIdentifiers;
	/**
	 * @var \Pribi\Commands\Identifiers\Identifiers
	 */
	private $partitionIdentifiers;

	public function __construct(
		\Pribi\Commands\Identifiers\Identifier $tableIdentifier,
		\Pribi\Commands\Identifiers\Identifiers $columnIdentifiers,
		\Pribi\Commands\Identifiers\Identifiers $partitionIdentifiers,
		\Pribi\Commands\Command $previousCommand,
		\Pribi\Builders\Commands\Builder $commandBuilder
	) {
		parent::__construct($tableIdentifier, $this, $commandBuilder);
		$this->columnIdentifiers = $columnIdentifiers;
		$this->partitionIdentifiers = $partitionIdentifiers;
	}

	protected function toSql() {
		return
			'INTO ' . $this->getIdentifier()->toSql() .
			($this->partitionIdentifiers->count() > 0
				? ' PARTITION (' . $this->partitionIdentifiers->toSql() . ')'
				: ''
			) . ($this->columnIdentifiers->count() > 0
				? ' (' . $this->columnIdentifiers->toSql() . ')'
				: ''
			);
	}

	public function values(array $values) {
		return $this->getCommandBuilder()->createValues($this->getCommandBuilder()->createSubjects($values), $this);
	}

	public function set($columnName, $expression) {
		return $this->getCommandBuilder()->createAnyQuerySet(
			$this->getCommandBuilder()->createIdentifier($columnName),
			$this->getCommandBuilder()->createSubject($expression),
			$this
		);
	}

	public function select($subject) {
		return $this->getCommandBuilder()->createAnyQuerySelect(
			$this->getCommandBuilder()->createIdentifier($subject),
			$this
		);
	}
}
