<?php
namespace Tests\Helpers;

abstract class CommandTestCase extends \PHPUnit_Framework_TestCase {

	private $commandBuilder;

	protected function setUp() {
		$this->commandBuilder = $this->getMock(\Pribi\Builders\CommandBuilder::class);
	}

	/**
	 * @return \Pribi\Builders\CommandBuilder
	 */
	protected function getCommandsBuilderDummy() {
		return $this->commandBuilder;
	}

	/**
	 * @return \PHPUnit_Framework_MockObject_MockObject
	 */
	protected function createCommandBuilderMock() {
		return $this->getMock(\Pribi\Builders\CommandBuilder::class);
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
