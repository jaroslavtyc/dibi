<?php
namespace Pribi\Commands\AnyQueryStatements\Executions;

/**
 * Class DoCommand
 * @package Pribi\Commands\AnyQueryStatements\Executions
 * @see http://dev.mysql.com/doc/refman/5.1/en/do.html
 */
class DoCommand extends \Pribi\Commands\WithoutIdentifier {

	private $expression;

	public function __construct(\Pribi\Commands\Subjects\Subject $expression, \Pribi\Commands\Command $previousCommand, \Pribi\Builders\CommandBuilder $commandBuilder) {
		parent::__construct($previousCommand, $commandBuilder);
		$this->expression = $expression;
	}

	protected function toSql() {
		return 'DO ' . $this->expression->toSql();
	}
}