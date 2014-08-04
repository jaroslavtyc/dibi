<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class ValuesTest extends \Tests\Helpers\CommandTestCase {

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

	public function testCanUseOnDuplicateKeyUpdate() {
		$columnName = 'foo';
		$expression = 'bar';
		$commandsBuilder = $this->getMock(\Pribi\Builders\CommandsBuilder::class);
		$commandsBuilder->expects($this->once())
			->method('createIdentifier')
			->with($columnName)
			->willReturn($columnIdentifier = $this->createIdentifierDummy());
		$commandsBuilder->expects($this->once())
			->method('createSubject')
			->with($expression)
			->willReturn($expressionSubject = $this->createSubjectDummy());
		$commandsBuilder->expects($this->once())
			->method('createOnDuplicateKeyUpdate')
			->with($columnIdentifier, $expressionSubject)
			->willReturn($onDuplicateKeyUpdateDummy = 'baz');
		/** @var \Pribi\Builders\CommandsBuilder $commandsBuilder */
		$values = new Values($this->createSubjectsDummy(), $this->createCommandDummy(), $commandsBuilder);
		$this->assertSame($onDuplicateKeyUpdateDummy, $values->onDuplicateKeyUpdate($columnName, $expression));
	}
}
