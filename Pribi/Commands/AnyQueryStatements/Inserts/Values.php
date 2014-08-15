<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class Values extends \Pribi\Commands\Command {

	private $subjects;

	public function __construct(
		\Pribi\Commands\Subjects\Subjects $subjects,
		\Pribi\Commands\Command $previousCommand,
		\Pribi\Builders\CommandBuilder $commandBuilder
	) {
		parent::__construct($previousCommand, $commandBuilder);
		$this->subjects = $subjects;
	}

	protected function toSql() {
		return 'VALUES (' . $this->subjects->toSql() . ')';
	}

	public function onDuplicateKeyUpdate($columnName, $expression) {
		return $this->getCommandBuilder()->createOnDuplicateKeyUpdate(
			$this->getCommandBuilder()->createIdentifier($columnName),
			$this->getCommandBuilder()->createSubject($expression),
			$this
		);
	}
}
