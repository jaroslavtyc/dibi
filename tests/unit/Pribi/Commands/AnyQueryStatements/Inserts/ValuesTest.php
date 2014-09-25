<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class ValuesTest extends \tests\unit\helpers\CommandTestCase {

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
		$commandBuilderMock = $this->createCommandBuilderMock();
		$commandBuilderMock->expects($this->once())
			->method('createIdentifier')
			->with($columnName)
			->willReturn($columnIdentifier = $this->createIdentifierDummy());
		$commandBuilderMock->expects($this->once())
			->method('createSubject')
			->with($expression)
			->willReturn($expressionSubject = $this->createSubjectDummy());
		$commandBuilderMock->expects($this->once())
			->method('createOnDuplicateKeyUpdate')
			->with($columnIdentifier, $expressionSubject /* Why the hell PHPUnit does not fail here, when $previousCommand is missing ? */)
			->willReturn($onDuplicateKeyUpdateDummy = 'baz');
		/** @var \Pribi\Builders\Commands\Builder $commandBuilderMock */
		$values = new Values($this->createSubjectsDummy(), $this->createCommandDummy(), $commandBuilderMock);
		$this->assertSame($onDuplicateKeyUpdateDummy, $values->onDuplicateKeyUpdate($columnName, $expression));
	}
}
