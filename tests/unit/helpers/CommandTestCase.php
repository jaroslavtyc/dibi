<?php
namespace tests\unit\helpers;

abstract class CommandTestCase extends \Codeception\TestCase\Test {

	private $commandBuilderDummy;

	protected function setUp() {
		$this->commandBuilderDummy = $this->createCommandBuilderMock();
	}

	protected function huntUnexpectedFollowingStatements(){
		$hunter = new \tests\unit\helpers\HunterOfUnexpectedFollowingStatement(new ExpectedStatementsFinder, new AvailableStatementsFinder());
		$hunter->hunt(preg_replace('~Test$~', '', static::class));
	}

	/**
	 * @return \Pribi\Builders\ClosingQueries\Builder
	 */
	protected function getClosingQueriesBuilder() {
		return $this->getMockBuilder(\Pribi\Builders\ClosingQueries\Builder::class)
			->disableOriginalConstructor()
			->getMock();
	}

	/**
	 * @return \Pribi\Builders\Commands\Builder
	 */
	protected function getCommandsBuilderDummy() {
		return $this->commandBuilderDummy;
	}

	/**
	 * @return \PHPUnit_Framework_MockObject_MockObject
	 */
	protected function createCommandBuilderMock() {
		return $this->getMockBuilder(\Pribi\Builders\Commands\Builder::class)
			->disableOriginalConstructor()
			->getMock();
	}

	/**
	 * @return \Pribi\Commands\Command
	 */
	protected function createCommandDummy() {
		return $this->getMockBuilder(\Pribi\Commands\Command::class)
			->disableOriginalConstructor()
			->getMockForAbstractClass();
	}

	/**
	 * @return \Pribi\Commands\Identifiers\Identifier
	 */
	protected function createIdentifierDummy() {
		return $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->getMock();
	}

	/**
	 * @return \Pribi\Commands\Identifiers\Identifiers
	 */
	protected function createIdentifiersDummy() {
		return $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifiers::class)
			->disableOriginalConstructor()
			->getMock();
	}

	/**
	 * @return \Pribi\Commands\Subjects\Subject
	 */
	protected function createSubjectDummy() {
		return $this->getMockBuilder(\Pribi\Commands\Subjects\Subject::class)
			->disableOriginalConstructor()
			->getMock();
	}

	/**
	 * @return \Pribi\Commands\Subjects\Subjects
	 */
	protected function createSubjectsDummy() {
		return $this->getMockBuilder(\Pribi\Commands\Subjects\Subjects::class)
			->disableOriginalConstructor()
			->getMock();
	}

	/**
	 * @param string $className
	 * @return \ReflectionMethod
	 */
	protected function createToSqlReflectionMethod($className) {
		$toSqlMethod = new \ReflectionMethod($className, 'toSql');
		$toSqlMethod->setAccessible(TRUE);

		return $toSqlMethod;
	}
}
