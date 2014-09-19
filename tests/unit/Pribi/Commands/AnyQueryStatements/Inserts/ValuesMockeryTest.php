<?php
namespace Pribi\Commands\AnyQueryStatements\Inserts;

class ValuesMockeryTest extends \Tests\Unit\Helpers\CommandTestCase {

	public function testCanCreateInstance() {
		$instance = new Values($this->createSubjectsDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsValuesKeywordWithSubjectsWrappedByBracket() {
		$toSqlMethod = new \ReflectionMethod(Values::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$subjectsAsSqlDummy = 'foo';
		$subjectsMock = \Mockery::mock(\Pribi\Commands\Subjects\Subjects::class)
			->shouldAllowMockingProtectedMethods();
		$subjectsMock->shouldReceive('toSql')
			->with()
			->once()
			->andReturn($subjectsAsSqlDummy);
		/** @var \Pribi\Commands\Subjects\Subjects $subjectsMock */
		$values = new Values($subjectsMock, $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertSame("VALUES ($subjectsAsSqlDummy)", $toSqlMethod->invoke($values));
	}

	public function testCanBeFollowedByOnDuplicateKeyUpdate() {
		$columnName = 'foo';
		$expression = 'bar';
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		$columnIdentifier = $this->createIdentifierDummy();
		$commandBuilder->shouldReceive('createIdentifier')
			->with($columnName)
			->once()
			->andReturn($columnIdentifier);
		$expressionSubject = $this->createSubjectDummy();
		$commandBuilder->shouldReceive('createSubject')
			->with($expression)
			->once()
			->andReturn($expressionSubject);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$values = new Values($this->createSubjectsDummy(), $this->createCommandDummy(), $commandBuilder);
		$onDuplicateKeyUpdateDummy = 'baz';
		/** @var \Mockery\MockInterface $commandBuilder */
		$commandBuilder->shouldReceive('createOnDuplicateKeyUpdate')
			->with($columnIdentifier, $expressionSubject, $values)
			->once()
			->andReturn($onDuplicateKeyUpdateDummy);
		$this->assertSame($onDuplicateKeyUpdateDummy, $values->onDuplicateKeyUpdate($columnName, $expression));
	}

	protected function tearDown() {
		\Mockery::close();
	}
}
