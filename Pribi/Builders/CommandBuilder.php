<?php
namespace Pribi\Builders;

class CommandBuilder extends \Pribi\Core\Object {

	public function createIdentifier($subject) {
		return new \Pribi\Commands\Identifiers\Identifier($subject);
	}

	public function createIdentifiers(array $subjects) {
		return new \Pribi\Commands\Identifiers\Identifiers($subjects, $this);
	}

	public function createSubject($subjectValue) {
		return new \Pribi\Commands\Subjects\Subject($subjectValue, $this);
	}

	public function createSubjects(array $subjectValues) {
		return new \Pribi\Commands\Subjects\Subjects($subjectValues, $this);
	}

	public function createQuery() {
		return new \Pribi\Commands\Openers\Query($this);
	}

	public function createSubQuery() {
		return new \Pribi\Commands\SubQueries\SubQuery($this);
	}

	public function createMainQuerySelect(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Selects\Select($identifier, $previousCommand, $this);
	}

	public function createMainQueryUpdate(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Updates\Update($identifier, $previousCommand, $this);
	}

	public function createAnyQuerySelect(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Selects\Select($identifier, $previousCommand, $this);
	}

	public function createSelectAlias(\Pribi\Commands\Identifiers\Identifier $alias, \Pribi\Commands\AnyQueryStatements\Selects\Select $prependSelect) {
		return new \Pribi\Commands\AnyQueryStatements\Selects\SelectAlias($alias, $prependSelect, $this);
	}

	public function createLowPriority(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Inserts\LowPriority($previousCommand, $this);
	}

	public function createHighPriority(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Inserts\HighPriority($previousCommand, $this);
	}

	public function createDelayed(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Inserts\Delayed($previousCommand, $this);
	}

	public function createIgnore(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Inserts\Ignore($previousCommand, $this);
	}

	public function createInsert(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Inserts\Insert($previousCommand, $this);
	}

	public function createInto(
		\Pribi\Commands\Identifiers\Identifier $tableIdentifier,
		\Pribi\Commands\Identifiers\Identifiers $columnIdentifiers,
		\Pribi\Commands\Identifiers\Identifiers $partitionIdentifiers,
		\Pribi\Commands\Command $previousCommand
	) {
		return new \Pribi\Commands\AnyQueryStatements\Inserts\Into($tableIdentifier, $columnIdentifiers, $partitionIdentifiers, $previousCommand, $this);
	}

	public function createValues(
		\Pribi\Commands\Subjects\Subjects $subjects,
		\Pribi\Commands\Command $previousCommand
	) {
		return new \Pribi\Commands\AnyQueryStatements\Inserts\Values($subjects, $previousCommand, $this);
	}

	public function createAnyQuerySet(
		\Pribi\Commands\Identifiers\Identifier $columnIdentifier,
		\Pribi\Commands\Subjects\Subject $expression,
		\Pribi\Commands\Command $previousCommand
	) {
		return new \Pribi\Commands\AnyQueryStatements\Inserts\Set($columnIdentifier, $expression, $previousCommand, $this);
	}

	public function createOnDuplicateKeyUpdate(\Pribi\Commands\Identifiers\Identifier $columnName, \Pribi\Commands\Subjects\Subject $expression, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Inserts\OnDuplicateKeyUpdate($columnName, $expression, $previousCommand, $this);
	}

	public function createDelete(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\Deletions\Delete($identifier, $previousCommand, $this);
	}

	public function createMainQueryStartTransaction(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Transactions\StartTransactions\StartTransaction($previousCommand, $this);
	}

	public function createMainQueryBegin(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Transactions\Begins\Begin($previousCommand, $this);
	}

	public function createMainQueryBeginWork(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Transactions\Begins\BeginWork($previousCommand, $this);
	}

	public function createMainQueryWork(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Transactions\Begins\BeginWork($previousCommand, $this);
	}

	public function createMainQueryCommit(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Transactions\Commits\Commit($previousCommand, $this);
	}

	public function createMainQueryCommitWork(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Transactions\Commits\CommitWork($previousCommand, $this);
	}

	public function createMainQueryDisableAutocommit(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Transactions\Options\DisableAutocommit($previousCommand, $this);
	}

	public function createMainQueryEnableAutocommit(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Transactions\Options\EnableAutocommit($previousCommand, $this);
	}

	public function createMainQueryRollback(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Transactions\Rollbacks\Rollback($previousCommand, $this);
	}

	public function createMainQueryRollbackWork(\Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Transactions\Rollbacks\RollbackWork($previousCommand, $this);
	}

	public function createFrom(\Pribi\Commands\Identifiers\Identifier $fromSource, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\FromDefinitions\From($fromSource, $previousCommand, $this);
	}
}
