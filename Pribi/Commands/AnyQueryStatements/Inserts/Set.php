<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

use Pribi\Commands\WithIdentifier;

class Set extends WithIdentifier {

	/**
	 * @var \Pribi\Commands\Subjects\Subject
	 */
	private $expression;

	public function __construct(
		\Pribi\Commands\Identifiers\Identifier $columnIdentifier,
		\Pribi\Commands\Subjects\Subject $expression,
		\Pribi\Commands\Command $previousCommand,
		\Pribi\Builders\Commands\Builder $commandBuilder
	) {
		parent::__construct($columnIdentifier, $previousCommand, $commandBuilder);
		$this->expression = $expression;
	}

	protected function toSql() {
		return (is_a($this->getPreviousCommand(), __CLASS__)
			? ',' // chain of SET statements
			: 'SET ' // first SET statement
		) . $this->getIdentifier()->toSql() . '=' . $this->expression->toSql();
	}

	public function set($columnName, $expression) {
		return $this->getCommandBuilder()->createAnyQuerySet(
			$this->getCommandBuilder()->createIdentifier($columnName),
			$this->getCommandBuilder()->createSubject($expression),
			$this
		);
	}

	public function onDuplicateKeyUpdate($columnName, $expression) {
		return $this->getCommandBuilder()->createOnDuplicateKeyUpdate(
			$this->getCommandBuilder()->createIdentifier($columnName),
			$this->getCommandBuilder()->createSubject($expression),
			$this
		);
	}
}
