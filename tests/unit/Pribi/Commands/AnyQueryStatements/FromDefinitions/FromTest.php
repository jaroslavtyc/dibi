<?php
namespace Pribi\Commands\AnyQueryStatements\FromDefinitions;

class FromTest extends \tests\unit\Pribi\Commands\AnyQueryStatements\FromDefinitions\FromBaseTestHelper {

	public function testCanCreateInstance() {
		$instance = new $this->testedClassName(
			$this->createIdentifierDummy(),
			$this->createCommandDummy(),
			$this->getCommandsBuilderDummy()
		);
		$this->assertNotNull($instance);
	}

	protected function createPrependCommandDummy() {
		return $this->createCommandDummy();
	}

	public function testAsSqlIsExpectedKeywordFollowedByTableName() {
		$toSqlMethod = new \ReflectionMethod(From::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$tableIdentifier = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->setMethods(['toSql'])
			->getMock();
		$tableName = 'foo';
		$tableIdentifier->expects($this->once())
			->method('toSql')
			->willReturn($tableName);
		/** @var \Pribi\Commands\Identifiers\Identifier $tableIdentifier */
		$from = $this->createNewInstance($tableIdentifier, $this->createCommandDummy(), $this->getCommandsBuilderDummy());
		$this->assertSame("FROM $tableName", $toSqlMethod->invoke($from));
	}

	public function testCanBeFollowedByAs() {
		$toSqlMethod = new \ReflectionMethod(From::class, 'toSql');
		$toSqlMethod->setAccessible(TRUE);
		$tableIdentifier = $this->getMockBuilder(\Pribi\Commands\Identifiers\Identifier::class)
			->disableOriginalConstructor()
			->getMock();
		$commandBuilder = $this->createCommandBuilderMock();
		/** @var \Pribi\Commands\Identifiers\Identifier $tableIdentifier */
		/** @var \Pribi\Builders\Commands\Builder $commandBuilder */
		$from = $this->createNewInstance($tableIdentifier, $this->createCommandDummy(), $commandBuilder);
		$aliasName = 'bar';
		$aliasIdentifier = $this->createIdentifierDummy();
		/** @var \PHPUnit_Framework_MockObject_MockObject $commandBuilder */
		$commandBuilder->expects($this->once())
			->method('createIdentifier')
			->with($aliasName)
			->willReturn($aliasIdentifier);
		$aliasDummy = 'baz';
		$commandBuilder->expects($this->once())
			->method('createAnyQueryFromAlias')
			->with($aliasIdentifier, $from)
			->willReturn($aliasDummy);
		/** @var \Pribi\Commands\AnyQueryStatements\FromDefinitions\From $from */
		$this->assertSame($aliasDummy, $from->as('bar'));
	}
}
