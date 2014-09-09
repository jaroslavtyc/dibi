<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class ValuesProphecyTest extends \Tests\Helpers\CommandTestCase {

	/**
	 * @var \Prophecy\Prophet
	 */
	private $prophet;

	protected function setUp() {
		parent::setUp();
		$this->prophet = new \Prophecy\Prophet();
	}

	public function testCanCreateInstance() {
		$instance = new Values($this->createSubjectsDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsValuesKeywordWithSubjectsWrappedByBracket() {
		$toSqlMethod = new \ReflectionMethod(Values::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$subjectsAsSqlDummy = 'foo';
		$subjectsMock = $this->getMockBuilder(\Pribi\Commands\Subjects\Subjects::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$subjectsMock->expects($this->once())
			->method('toSql')
			->with() // no parameters expected
			->willReturn($subjectsAsSqlDummy);
		/** @var \Pribi\Commands\Subjects\Subjects $subjectsMock */
		$values = new Values($subjectsMock, $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertSame("VALUES ($subjectsAsSqlDummy)", $toSqlMethod->invoke($values));
	}

	public function testCanBeFollowedByOnDuplicateKeyUpdate() {
		$columnName = 'foo';
		$expression = 'bar';
		$commandBuilder = $this->prophet->prophesize(\Pribi\Builders\Commands\Builder::class);
		$columnIdentifier = $this->createIdentifierDummy();
		$commandBuilder->createIdentifier($columnName)->willReturn($columnIdentifier);
		$expressionSubject = $this->createSubjectDummy();
		$commandBuilder->createSubject($expression)
			->willReturn($expressionSubject);
		$values = new Values($this->createSubjectsDummy(), $this->createCommandDummy(), $commandBuilder->reveal());
		$onDuplicateKeyUpdateDummy = 'baz';
		$commandBuilder->createOnDuplicateKeyUpdate($columnIdentifier, $expressionSubject, $values)
			->willReturn($onDuplicateKeyUpdateDummy);
		$this->assertSame($onDuplicateKeyUpdateDummy, $values->onDuplicateKeyUpdate($columnName, $expression));
	}
}
