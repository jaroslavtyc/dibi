<?php
namespace Pribi\Builders\Commands;

class Builder extends \Pribi\Core\Object {

	private $closingQueryBuilder;

	public function __construct(\Pribi\Builders\ClosingQueries\Builder $closingQueryBuilder) {
		$this->closingQueryBuilder = $closingQueryBuilder;
	}

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

	public function createQueryInitializer() {
		return new \Pribi\Commands\Openers\QueryInitializer($this);
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

	public function createAnyQuerySelectAlias(\Pribi\Commands\Identifiers\Identifier $alias, \Pribi\Commands\AnyQueryStatements\Selects\Select $prependSelect) {
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

	public function createAnyQueryFrom(\Pribi\Commands\Identifiers\Identifier $fromSource, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\FromDefinitions\From($fromSource, $previousCommand, $this);
	}

	public function createAnyQueryFromAlias(\Pribi\Commands\Identifiers\Identifier $alias, \Pribi\Commands\AnyQueryStatements\FromDefinitions\From $prependFrom) {
		return new \Pribi\Commands\AnyQueryStatements\FromDefinitions\FromAlias($alias, $prependFrom, $this);
	}

	public function createMainQueryFromAlias(\Pribi\Commands\Identifiers\Identifier $alias, \Pribi\Commands\MainQueryStatements\FromDefinitions\From $prependFrom) {
		return new \Pribi\Commands\MainQueryStatements\FromDefinitions\FromAlias($alias, $prependFrom, $this);
	}

	public function createMainQueryFrom(\Pribi\Commands\Identifiers\Identifier $fromSource, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\FromDefinitions\From($fromSource, $previousCommand, $this);
	}

	public function createAnyQueryInnerJoin(\Pribi\Commands\Identifiers\Identifier $joinedTable, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Joins\InnerJoin($joinedTable, $previousCommand, $this);
	}

	public function createAnyQueryInnerJoinAlias(
		\Pribi\Commands\Identifiers\Identifier $aliasIdentifier,
		\Pribi\Commands\AnyQueryStatements\Joins\InnerJoin $prependInnerJoin
	) {
		return new \Pribi\Commands\AnyQueryStatements\Joins\InnerJoinAlias($aliasIdentifier, $prependInnerJoin, $this);
	}

	public function createAnyQueryOn(
		\Pribi\Commands\Identifiers\Identifier $identifier,
		\Pribi\Commands\Command $previousJoinOrItsAlias
	) {
		return new \Pribi\Commands\AnyQueryStatements\Joins\On($identifier, $previousJoinOrItsAlias, $this);
	}

	public function createAnyQueryLeftJoin(\Pribi\Commands\Identifiers\Identifier $joinedTable, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Joins\LeftJoin($joinedTable, $previousCommand, $this);
	}

	public function createAnyQueryLeftJoinAlias(
		\Pribi\Commands\Identifiers\Identifier $aliasIdentifier,
		\Pribi\Commands\AnyQueryStatements\Joins\LeftJoin $prependLeftJoin
	) {
		return new \Pribi\Commands\AnyQueryStatements\Joins\LeftJoinAlias($aliasIdentifier, $prependLeftJoin, $this);
	}

	public function createAnyQueryRightJoin(\Pribi\Commands\Identifiers\Identifier $joinedTable, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Joins\RightJoin($joinedTable, $previousCommand, $this);
	}

	public function createAnyQueryRightJoinAlias(
		\Pribi\Commands\Identifiers\Identifier $aliasIdentifier,
		\Pribi\Commands\AnyQueryStatements\Joins\RightJoin $prependRightJoin
	) {
		return new \Pribi\Commands\AnyQueryStatements\Joins\LeftJoinAlias($aliasIdentifier, $prependRightJoin, $this);
	}

	public function createMainQueryWhere(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\WhereConditions\Where($identifier, $previousCommand, $this);
	}

	public function createAnyQueryWhere(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\WhereConditions\Where($identifier, $previousCommand, $this);
	}

	public function createAnyQueryConjunction(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Conditions\Conjunction($identifier, $previousCommand, $this);
	}

	public function createMainQueryConjunction(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Conditions\Conjunction($identifier, $previousCommand, $this);
	}

	public function createAnyQueryDisjunction(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Conditions\Disjunction($identifier, $previousCommand, $this);
	}

	public function createMainQueryDisjunction(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Conditions\Disjunction($identifier, $previousCommand, $this);
	}

	public function createAnyQueryAndNot(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Conditions\AndNot($identifier, $previousCommand, $this);
	}

	public function createMainQueryAndNot(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Conditions\AndNot($identifier, $previousCommand, $this);
	}

	public function createAnyQueryOrNot(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Conditions\OrNot($identifier, $previousCommand, $this);
	}

	public function createMainQueryOrNot(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Conditions\OrNot($identifier, $previousCommand, $this);
	}

	public function createAnyQueryEqualTo(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Conditions\EqualTo($identifier, $previousCommand, $this);
	}

	public function createMainQueryEqualTo(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Conditions\EqualTo($identifier, $previousCommand, $this);
	}

	public function createAnyQueryEqualOrGreaterThen(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrGreaterThen($identifier, $previousCommand, $this);
	}

	public function createMainQueryEqualOrGreaterThen(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Conditions\EqualOrGreaterThen($identifier, $previousCommand, $this);
	}

	public function createAnyQueryEqualOrLesserThen(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Conditions\EqualOrLesserThen($identifier, $previousCommand, $this);
	}

	public function createMainQueryEqualOrLesserThen(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Conditions\EqualOrLesserThen($identifier, $previousCommand, $this);
	}

	public function createAnyQueryGreaterThen(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Conditions\GreaterThen($identifier, $previousCommand, $this);
	}

	public function createMainQueryGreaterThen(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Conditions\GreaterThen($identifier, $previousCommand, $this);
	}

	public function createAnyQueryLesserThen(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Conditions\LesserThen($identifier, $previousCommand, $this);
	}

	public function createMainQueryLesserThen(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Conditions\LesserThen($identifier, $previousCommand, $this);
	}

	public function createAnyQueryDifferentTo(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Conditions\DifferentTo($identifier, $previousCommand, $this);
	}

	public function createMainQueryDifferentTo(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Conditions\DifferentTo($identifier, $previousCommand, $this);
	}

	public function createMainQueryWhereNot(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\WhereConditions\WhereNot($identifier, $previousCommand, $this);
	}

	public function createAnyQueryWhereNot(\Pribi\Commands\Identifiers\Identifier $identifier, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\WhereConditions\WhereNot($identifier, $previousCommand, $this);
	}

	public function createAnyQueryLimit($offset, $limit, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\AnyQueryStatements\Limits\Limit($offset, $limit, $previousCommand, $this);
	}

	public function createMainQueryLimit($offset, $limit, \Pribi\Commands\Command $previousCommand) {
		return new \Pribi\Commands\MainQueryStatements\Limits\Limit($offset, $limit, $previousCommand, $this);
	}

	public function createCompleteQuery(\Pribi\Commands\Command $command) {
		return $this->closingQueryBuilder->buildCompleteQuery($command);
	}
}
