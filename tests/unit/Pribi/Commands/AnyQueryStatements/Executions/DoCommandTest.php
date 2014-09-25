<?php
namespace Pribi\Commands\AnyQueryStatements\Executions;

class DoCommandTest extends \tests\unit\helpers\CommandTestCase {

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
}
