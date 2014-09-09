<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

/**
 * Class OnDuplicateKeyUpdate
 * @package Pribi\Commands\AnyQueryStatements\Inserts
 *
 * @see http://dev.mysql.com/doc/refman/5.6/en/insert-on-duplicate.html
 */
class OnDuplicateKeyUpdate extends \Pribi\Commands\Command {

	private $columnName;
	private $expression;

	public function __construct(
		\Pribi\Commands\Identifiers\Identifier $columnIdentifier,
		\Pribi\Commands\Subjects\Subject $expression,
		\Pribi\Commands\Command $previousCommand,
		\Pribi\Builders\Commands\Builder $commandBuilder
	) {
		parent::__construct($previousCommand, $commandBuilder);
		$this->columnName = $columnIdentifier;
		$this->expression = $expression;
	}

	protected function toSql() {
		if (is_a($this->getPreviousCommand(), __CLASS__)) { // chain of the same command
			return ',' . $this->columnName->toSql() . '=' . $this->expression->toSql();
		} else {
			return 'ON DUPLICATE KEY UPDATE ' . $this->columnName->toSql() . '=' . $this->expression->toSql();
		}
	}

	public function onDuplicateKeyUpdate($columnName, $expression) {
		return $this->getCommandBuilder()->createOnDuplicateKeyUpdate(
			$this->getCommandBuilder()->createIdentifier($columnName),
			$this->getCommandBuilder()->createSubject($expression),
			$this
		);
	}
}
 