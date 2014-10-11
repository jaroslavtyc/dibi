<?php
namespace Pribi\Commands\MainQueryStatements\Executions;

class DoCommandTest extends \tests\unit\helpers\StatementTestCase {

	public function testCanCreateInstance() {
		$instance = new DoCommand($this->createSubjectDummy(), $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertNotNull($instance);
	}

	public function testAsSqlIsDoKeywordWithExpression() {
		$expressionSubjectDummy = $this->getMockBuilder(\Pribi\Commands\Subjects\Subject::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$expressionAsSql = 'foo';
		$expressionSubjectDummy->expects($this->once())
			->method('toSql')
			->willReturn($expressionAsSql);
		/** @var \Pribi\Commands\Subjects\Subject $expressionSubjectDummy */
		$do = new DoCommand($expressionSubjectDummy, $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$toSqlMethod = new \ReflectionMethod(DoCommand::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$this->assertSame("DO $expressionAsSql", $toSqlMethod->invoke($do));
	}

	public function testQueryCanBeExecuted() {
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$do = new DoCommand($this->createSubjectDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Mockery\MockInterface $commandBuilder */
		$completeQuery = \Mockery::mock(\Pribi\Resources\CompleteQuery::class);
		$resultDummy = 'foo';
		$completeQuery->shouldReceive('execute')
			->withNoArgs()
			->andReturn($resultDummy);
		$commandBuilder->shouldReceive('createCompleteQuery')
			->with($do)
			->andReturn($completeQuery);
		$this->assertSame($resultDummy, $do->execute());
	}

	public function testQueryCanBeTested() {
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$do = new DoCommand($this->createSubjectDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Mockery\MockInterface $commandBuilder */
		$completeQuery = \Mockery::mock(\Pribi\Resources\CompleteQuery::class);
		$resultDummy = 'foo';
		$completeQuery->shouldReceive('test')
			->withNoArgs()
			->andReturn($resultDummy);
		$commandBuilder->shouldReceive('createCompleteQuery')
			->with($do)
			->andReturn($completeQuery);
		$this->assertSame($resultDummy, $do->test());
	}

	public function testQueryCanBeExplained() {
		$commandBuilder = \Mockery::mock(\Pribi\Builders\Commands\Builder::class);
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$do = new DoCommand($this->createSubjectDummy(), $this->createCommandDummy(), $commandBuilder);
		/** @var \Mockery\MockInterface $commandBuilder */
		$completeQuery = \Mockery::mock(\Pribi\Resources\CompleteQuery::class);
		$resultDummy = 'foo';
		$completeQuery->shouldReceive('explain')
			->withNoArgs()
			->andReturn($resultDummy);
		$commandBuilder->shouldReceive('createCompleteQuery')
			->with($do)
			->andReturn($completeQuery);
		$this->assertSame($resultDummy, $do->explain());
	}
}
